<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class ForgotPassword extends Controller
{
    public function index()
    {
        return view('forgot_password/index');
    }

    public function sendOtp()
    {
        $email = $this->request->getPost('email');
        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if ($user) {
            $otp = rand(10000, 99999);
            $expiresAt = date('Y-m-d H:i:s', strtotime('+15 minutes'));

            $userModel->update($user['id'], [
                'reset_code' => $otp,
                'reset_expires_at' => $expiresAt
            ]);

            // Email sending logic
            $emailService = \Config\Services::email();
            $emailService->setTo($email);
            $emailService->setSubject('Your QuickChat Password Reset OTP');
            $emailService->setMessage("Your OTP for password reset is: $otp. It expires in 15 minutes.");

            if ($emailService->send()) {
                session()->set('reset_email', $email);
                return redirect()->to(base_url('forgot-password/verify-otp'))->with('success', 'OTP has been sent to your email.');
            } else {
                $error = $emailService->printDebugger(['headers']);
                log_message('error', 'SMTP Error: ' . $error);
                $shortError = substr(strip_tags($error), 0, 200);
                return redirect()->back()->with('error', 'Failed to send OTP. Error: ' . $shortError . '... Please check system logs for full details.');
            }
        } else {
            return redirect()->back()->with('error', 'Email address not found.');
        }
    }

    public function verifyOtp()
    {
        return view('forgot_password/verify_otp');
    }

    public function validateOtp()
    {
        $otp = $this->request->getPost('otp');
        $email = session()->get('reset_email');
        $userModel = new UserModel();

        $user = $userModel->where('email', $email)
            ->where('reset_code', $otp)
            ->where('reset_expires_at >=', date('Y-m-d H:i:s'))
            ->first();

        if ($user) {
            session()->set('otp_verified', true);
            return redirect()->to(base_url('forgot-password/reset-password'));
        } else {
            return redirect()->back()->with('error', 'Invalid or expired OTP.');
        }
    }

    public function resetPassword()
    {
        if (!session()->get('otp_verified')) {
            return redirect()->to(base_url('forgot-password'))->with('error', 'Please verify OTP first.');
        }
        return view('forgot_password/reset_password');
    }

    public function updatePassword()
    {
        if (!session()->get('otp_verified')) {
            return redirect()->to(base_url('forgot-password'))->with('error', 'Please verify OTP first.');
        }

        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');

        if ($password !== $confirmPassword) {
            return redirect()->back()->with('error', 'Passwords do not match.');
        }

        $email = session()->get('reset_email');
        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if ($user) {
            $userModel->update($user['id'], [
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'reset_code' => null,
                'reset_expires_at' => null
            ]);

            session()->remove(['reset_email', 'otp_verified']);
            return redirect()->to(base_url('login'))->with('success', 'Password reset successfully. Please login.');
        } else {
            return redirect()->to(base_url('forgot-password'))->with('error', 'Something went wrong.');
        }
    }
}

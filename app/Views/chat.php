<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="chat-wrapper">
    <div class="chat-container glass-card p-0 overflow-hidden">
        <div class="row no-gutters h-100">
            <!-- Sidebar -->
            <div class="col-md-4 col-lg-3 sidebar border-right">
                <div class="p-3 sidebar-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0 font-weight-700 text-primary">Chats</h5>
                    <div class="dropdown">
                        <button class="btn btn-link text-muted p-0" data-toggle="dropdown">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="<?= base_url('logout') ?>"><i
                                    class="fas fa-sign-out-alt mr-2"></i>Logout</a>
                        </div>
                    </div>
                </div>
                <div class="px-3 pb-3">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light border-right-0"><i
                                    class="fas fa-search text-muted"></i></span>
                        </div>
                        <input type="text" class="form-control bg-light border-left-0" placeholder="Search users...">
                    </div>
                </div>
                <div class="user-list overflow-auto" id="user-list">
                    <div class="p-4 text-center text-muted">
                        <div class="spinner-border spinner-border-sm mb-2" role="status"></div>
                        <p class="small mb-0">Discovering people...</p>
                    </div>
                </div>
            </div>

            <!-- Chat Window -->
            <div class="col-md-8 col-lg-9 d-flex flex-column h-100 overflow-hidden">
                <!-- Welcome Screen -->
                <div id="no-chat-selected"
                    class="h-100 d-flex flex-column align-items-center justify-content-center text-center p-5">
                    <div class="bg-light rounded-circle p-4 mb-3">
                        <i class="fas fa-comments text-muted fa-4x"></i>
                    </div>
                    <h4 class="text-muted font-weight-700">Welcome to QuickChat!</h4>
                    <p class="text-muted max-w-400">Select a friend from the left sidebar to start a conversation.</p>
                </div>

                <!-- Active Chat Screen -->
                <div id="chat-active" class="d-none flex-column h-100">
                    <div class="chat-header p-3 border-bottom d-flex align-items-center">
                        <div class="avatar-circle mr-3" id="header-avatar">?</div>
                        <div>
                            <h6 class="mb-0 font-weight-700" id="chat-header-name">Username</h6>
                            <small class="text-success"><i class="fas fa-circle fa-xs mr-1"></i>Online</small>
                        </div>
                        <div class="ml-auto">
                            <button class="btn btn-link text-muted"><i class="fas fa-phone-alt"></i></button>
                            <button class="btn btn-link text-muted"><i class="fas fa-video"></i></button>
                            <button class="btn btn-link text-muted"><i class="fas fa-info-circle"></i></button>
                        </div>
                    </div>

                    <div class="chat-messages p-4 flex-grow-1 overflow-auto bg-light" id="chat-messages">
                        <!-- Messages loaded via AJAX -->
                    </div>

                    <div class="chat-input-area p-3 border-top bg-white">
                        <div class="d-flex align-items-center">
                            <div class="d-flex mr-2">
                                <button class="btn btn-link text-muted px-2"><i class="far fa-smile fa-lg"></i></button>
                                <button class="btn btn-link text-muted px-2"><i
                                        class="fas fa-paperclip fa-lg"></i></button>
                            </div>
                            <input type="text" id="message-input"
                                class="form-control border-0 bg-light rounded-pill px-4" placeholder="Type a message..."
                                autocomplete="off">
                            <button
                                class="btn btn-premium rounded-circle ml-3 d-flex align-items-center justify-content-center"
                                id="send-btn" style="width: 45px; height: 45px; min-width: 45px;">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<style>
    body {
        overflow: hidden;
    }

    .chat-wrapper {
        height: 100vh;
        padding: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .chat-container {
        width: 100%;
        max-width: 1200px;
        height: 100%;
        max-height: 800px;
    }

    .sidebar {
        height: 100%;
        display: flex;
        flex-direction: column;
        background: #fff;
    }

    .user-list {
        flex: 1;
    }

    .user-item {
        padding: 15px 20px;
        cursor: pointer;
        transition: all 0.2s ease;
        border-left: 4px solid transparent;
        display: flex;
        align-items: center;
    }

    .user-item:hover {
        background-color: #f8f9fa;
    }

    .user-item.active {
        background-color: #eef2ff;
        border-left-color: #4e73df;
    }

    .avatar-circle {
        width: 45px;
        height: 45px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    .user-info {
        margin-left: 12px;
        overflow: hidden;
    }

    .user-info h6 {
        margin-bottom: 2px;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .chat-messages {
        display: flex;
        flex-direction: column;
        min-height: 0;
    }

    .chat-header,
    .chat-input-area {
        flex-shrink: 0;
    }

    .message {
        margin-bottom: 15px;
        max-width: 75%;
        padding: 10px 16px;
        border-radius: 20px;
        position: relative;
        font-size: 0.95rem;
        line-height: 1.4;
        clear: both;
    }

    .message.sent {
        align-self: flex-end;
        background: linear-gradient(to right, #667eea, #764ba2);
        color: white;
        border-bottom-right-radius: 4px;
        box-shadow: 0 4px 10px rgba(118, 75, 162, 0.2);
    }

    .message.received {
        align-self: flex-start;
        background: #fff;
        color: #333;
        border-bottom-left-radius: 4px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .max-w-400 {
        max-width: 400px;
    }

    .font-weight-700 {
        font-weight: 700;
    }

    /* Scrollbar Styling */
    ::-webkit-scrollbar {
        width: 6px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #999;
    }

    @media (max-width: 768px) {
        .chat-wrapper {
            padding: 10px;
        }

        .sidebar {
            display: none;
        }

        /* Mobile logic would need toggle */
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    let selectedUserId = null;
    let lastMessageCount = 0;

    function getInitials(name) {
        return name.split(' ').map(n => n[0]).join('').toUpperCase().substring(0, 2);
    }

    function loadUsers() {
        $.get('<?= base_url('chat/getUsers') ?>', function (users) {
            let html = '';
            users.forEach(user => {
                let activeClass = (selectedUserId == user.id) ? 'active' : '';
                html += `<div class="user-item ${activeClass}" onclick="selectUser(${user.id}, '${user.username}')" id="user-${user.id}">
                            <div class="avatar-circle">${getInitials(user.username)}</div>
                            <div class="user-info">
                                <h6 class="font-weight-700 mb-0">${user.username}</h6>
                                <small class="text-muted">${user.email}</small>
                            </div>
                         </div>`;
            });
            $('#user-list').html(html);
        });
    }

    function selectUser(id, username) {
        selectedUserId = id;
        lastMessageCount = 0;
        $('.user-item').removeClass('active');
        $(`#user-${id}`).addClass('active');

        // Toggle visibility with both d-none and d-flex removal to avoid conflicts
        $('#no-chat-selected').removeClass('d-flex').addClass('d-none');
        $('#chat-active').removeClass('d-none').addClass('d-flex');

        $('#chat-header-name').text(username);
        $('#header-avatar').text(getInitials(username));

        $('#chat-messages').html('<div class="text-center text-muted mt-5"><div class="spinner-border spinner-border-sm" role="status"></div><br>Decrypting messages...</div>');
        loadMessages();
    }

    function loadMessages() {
        if (!selectedUserId) return;
        $.get('<?= base_url('chat/getMessages') ?>/' + selectedUserId, function (messages) {
            let html = '';
            messages.forEach(msg => {
                let type = (msg.sender_id == <?= session()->get('user_id') ?>) ? 'sent' : 'received';
                html += `<div class="message ${type}">${msg.message}</div>`;
            });

            if (messages.length !== lastMessageCount) {
                $('#chat-messages').html(html);
                $('#chat-messages').scrollTop($('#chat-messages')[0].scrollHeight);
                lastMessageCount = messages.length;
            }
        });
    }

    $(document).ready(function () {
        loadUsers();

        $('#send-btn').click(function () {
            let msg = $('#message-input').val();
            if (msg.trim() === '' || !selectedUserId) return;

            $.post('<?= base_url('chat/send') ?>', {
                receiver_id: selectedUserId,
                message: msg,
                <?= csrf_token() ?>: '<?= csrf_hash() ?>'
            }, function (res) {
                if (res.status === 'success') {
                    $('#message-input').val('');
                    loadMessages();
                } else {
                    showToast(res.message || 'Failed to send message', 'error');
                }
            });
        });

        $('#message-input').keypress(function (e) {
            if (e.which == 13) {
                $('#send-btn').click();
            }
        });

        // Polling for new messages and user list
        setInterval(function () {
            loadMessages();
        }, 3000);

        setInterval(function () {
            loadUsers();
        }, 10000);
    });
</script>
<?= $this->endSection() ?>
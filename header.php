<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * { margin: 0; padding: 0; }
        ul,li { list-style: none; }
        body { width: 100%; }
        .header { width: 100%; height: 100px; display: flex; flex-direction: row; justify-content: space-around; align-items: center; border-bottom: 1px solid #eee; }
        .nav { width: 900px; display: flex; flex-direction: row; justify-content: space-between; }
        .nav ul { width: 440px; height: 100px; display: flex; flex-direction: row; align-items: center; justify-content: space-between; }
        .nav ul li { width: 100px; height: 50px; text-align: center; line-height: 50px; background-color: #333; color: #fff; border-radius: 10px; cursor: pointer; }
        .buttons { width: 220px; height: 100px; display: flex; justify-content: space-between; align-items: center;  }
        .buttons button { width: 100px; height: 50px; border: none; background-color: #333; color: #fff; border-radius: 10px; cursor: pointer; }
        .user-info { display: flex; align-items: center; gap: 12px; }
        .user-info span { font-size: 14px; color: #333; font-weight: 600; }
        .logout-btn { background-color: #e04040 !important; width: 80px !important; }
        .logout-btn:hover { background-color: #b83232 !important; }
        .modal-overlate { width: 100%; height: 800px; display: flex; justify-content: center; align-items: center; }
        .modal { position: relative;width: 350px; height: 400px; display: flex; flex-direction: column; justify-content: space-between; border: 1px solid #ddd; border-radius: 8px; }
        .close-btn { width: 50px; height: 25px; position: absolute; left: 290px; top: 10px; border: none; background-color: #e04040; color: #fff; border-radius: 5px; cursor: pointer; }
        .loginPanel { width: 330px; height: 480px; padding: 10px; }
        .loginPanel > h2 { margin-bottom: 30px; }
        form { width: 330px; height: 250px; }
        .form-group { display: flex; flex-direction: column; width: 100%; height: 100px;  }
        .form-group label { margin-bottom: 10px; }
        .form-group input { padding: 10px; }
        .submit-btn { width: 50px; height: 25px; border-radius: 5px; cursor: pointer; border: none; background-color: #333; color: #fff; }
        p > span { text-decoration: underline; color: blue; cursor: pointer; }
        .signupPanel { width: 330px; height: 480px; padding: 10px; }
        .signupPanel > h2 { margin-bottom: 30px; }
        .active { display: flex; }
        .nActive { display: none; }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">logo</div>
        <div class="nav">
            <ul>
                <li>1</li>
                <li>2</li>
                <li>3</li>
                <li>4</li>
            </ul>
            <?php if (isset($_SESSION['username'])); ?>
            <div class="buttons">
                <button>로그인</button>
                <button>회원가입</button>
            </div>
        </div>
    </div>

    <div class="modal-overlate">
        <div class="modal">
            <button class="close-btn">x</button>

            <div class="loginPanel">
                <h2>로그인</h2>
                <form action="auth.php" method="POST">
                    <input type="hidden" name="action" value="login">
                    <div class="form-group">
                        <label>아이디</label>
                        <input type="text" name="username" placeholder="아이디">
                    </div>
                    <div class="form-group">
                        <label>비밀번호</label>
                        <input type="password" name="password" placeholder="비밀번호">
                    </div>
                    <button type="submit" class="submit-btn">로그인</button>
                </form>
                <p class="switch-text">계정이 없으신가요 <span href="#" class="signup">회원가입</span></p>
            </div>

            <div class="signupPanel" style="display:none">
                <h2>회원가입</h2>
                <form action="auth.php" method="POST">
                    <input type="hidden" name="action" value="signup">
                    <div class="form-group">
                        <label>아이디</label>
                        <input type="text" name="username" placeholder="아이디">
                    </div>
                    <div class="form-group">
                        <label>비밀번호</label>
                        <input type="password" name="password" placeholder="비밀번호">
                    </div>
                    <button type="submit" class="submit-btn">회원가입</button>
                </form>
                <p class="switch-text">이미 계정이 있으신가요 <span href="#" class="login">로그인</span></p>
            </div>
        </div>
    </div>
    <script>
        const loginPanel = document.querySelector('.loginPanel');
        const signupPanel = document.querySelector('.signupPanel');

        const login = document.querySelector('.login');
        const signup = document.querySelector('.signup');

        signup.addEventListener('click', (e) => {
            e.preventDefault();
            signupPanel.classList.add('active');
            loginPanel.classList.add('nActive');
        });

        loginPanel.addEventListener('click', (e) => {
            e.preventDefault();
            signup.classList.remove('active');
            login.classList.remove('nActive');
        });
    </script>
</body>
</html>
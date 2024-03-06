async function Login(event) {
    const loginButton = document.getElementById('login')
    const spinner = document.getElementById('spinner')
    loginButton.classList.add("disabled")
    spinner.classList.remove('d-none')

    event.preventDefault();
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    if (email == '' || password == '') {
      alert('* يرجى إدخال اسم المستخدم وكلمة المرور')
    } else {
      const res = await callAPI('api/Users/Login.php', {
        'email': email,
        'user_password': password
      });
      if(res.result == 1 && res.is_admin == 1) {
        window.location.href = "zzzAdminOkay.php"
        return;

      }
      else if (res.result == 1) {
        window.location.href = "zzzokay.php"
        return;
      } else alert(res.message);
    }
    loginButton.classList.remove("disabled")
    spinner.classList.add('d-none')

  }
async function create(event) {
    const createUserBtn = document.getElementById('createUser')
    createUserBtn.classList.add ("disabled")
  event.preventDefault();
  const username = document.getElementById('user_name').value;
  const password = document.getElementById('password').value;
  const email = document.getElementById('email').value;
  const confirmPassword = document.getElementById('confirm-password').value;

  if (username == '' || password == '' || confirmPassword == '' || email == '') {
    alert('* يرجى ملئ جميع الحقول المطلوبة    ')
  } else {
    if(password == confirmPassword) {
        const res = await callAPI('api/Users/createUser.php', {
      'user_name': username,
      'user_password': password,
      'email' : email
    });
    if (res.result == 1) {
     alert('تم انشاء حساب بنجاح')
     window.location.href = 'login.php'
     return;
    } else  {
        alert(res.message); 
    }

    }
    else alert('يرجى التأكد من كلمة السر')


  }
  createUserBtn.classList.remove ("disabled")
}


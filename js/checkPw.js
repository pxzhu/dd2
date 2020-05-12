/* 내 정보 변경 시 비밀번호 유효성 검사 */
function checkAll() { /* 공백 확인 함수 */
  if(!checkUserPw(form.userid.value, form.userpw.value, form.userpwc.value)){
    return false;
  }
  return true;
}
function checkExistData(value, dataName){
  if(value=""){
    alert(dataName + "입력해주세요!");
    return false;
  }
  return true;
}
function checkUserPw(userid, userpw, userpwc){
  if(!checkExistData(userpw,"비밀번호를 ")){
    return false;
  }
  if(!checkExistData(userpwc,"비밀번호 확인을 ")){
    return false;
  }
  var vdpw = /(?=.*\d{1,16})(?=.*[~`!@#$%\^&*()-+=]{1,16})(?=.*[a-zA-Z]{2,18}).{8,20}$/;
  if(!vdpw.test(userpw)){
    alert("비밀번호는 영문 대소문자와 숫자와 특수문자를 이용하여 8~20자로 입력해야합니다!");
      form.userpw.value="";
      form.userpw.focus();
      return false;
  }
  if(userpw != userpwc){
    alert("비밀번호가 일치하지 않습니다.");
    form.userpw.value="";
    form.userpwc.value="";
    form.userpwc.focus();
    return false;
  }
  if(userid == userpw){
    alert("아이디와 비밀번호는 같을 수 없습니다!");
    form.userpw.value="";
    form.userpwc.value="";
    form.userpwc.focus();
    return false;
  }
  return true;
}
/* 내 정보 변경 시 비밀번호 유효성 검사 끝 */

/* 새 비밀번호 입력 유효성 검사 */
function upCheckAll() { /* 공백 확인 함수 */
  if(!upCheckUserPw(form.userpw.value)){
    return false;
  }
  return true;
}
function upCheckUserPw(userpw){
  if(!checkExistData(userpw,"비밀번호를 ")){
    return false;
  }
  var vdpw = /(?=.*\d{1,16})(?=.*[~`!@#$%\^&*()-+=]{1,16})(?=.*[a-zA-Z]{2,18}).{8,20}$/;
  if(!vdpw.test(userpw)){
    alert("비밀번호는 영문 대소문자와 숫자와 특수문자를 이용하여 8~20자로 입력해야합니다!");
      form.userpw.value="";
      form.userpw.focus();
      return false;
  }
  return true;
}
/* 새 비밀번호 입력 유효성 검사 끝 */

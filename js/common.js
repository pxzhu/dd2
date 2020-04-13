/*$(function() {
  $("#dialog").dialog({
    autoOpen: false,
    modal: true,
    width: 650,
    height: 200,
    title: "댓글 수정",
  });
  $("#dialogBtn").on("click", function() {
    $("#dialog").dialog("open");
  });
});*/
$(document).ready(function(){
  $("#dialogBtn").click(function(){
    var obj = $(this).closest(".dap_lo").find("#dialogSc");
    obj.dialog({
      modal:true,
      width:650,
      hieght:200,
      title:"댓글 수정"
    });
  });
});

/*
function checkid(){
  var userid = document.getElementById("uid").value;
  if (userid) {
    url = "check.php?userid=" + userid;
    window.open(url, "chkid", "width=300,height=100");
  }
}
$('#uid').change(function(){
  $('.checkbutton').show();
  $('$uid').attr("check_result","fail");
})
if($('#uid').val()==''){
  alert("아이디를 입력하세요");
}
idOverlapInput=document.querySelector('input[]')*/

/* 회원가입, 비밀번호 찾기, 정보 수정 정규식 유효성 검사 */
function checkAll() { /* 공백 확인 함수 */
  if(!checkUserName(form.username.value)){
    return false;
  }
  if(!checkUserId(form.userid.value)){
    return false;
  }
  if(!checkUserPw(form.userid.value, form.userpw.value, form.userpwc.value)){
    return false;
  }
  if(!checkUserCode(form.code.value)){
    return false;
  }
  if(!checkUserPhone(form.userphone.value)){
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
function checkUserName(username){
  if(!checkExistData(username,"이름을 ")){
    return false;
  }
  var vdname = /^[가-힣]+$/;
  if(!vdname.test(username)){
    alert("이름은 2~4자리 한글로 입력해주세요.(4자리를 초과할 경우 4자리까지만 입력해주세요.)");
      form.username.value="";
      form.username.focus();
      return false;
  }
  return true;
}
function checkUserId(userid){
  if(!checkExistData(userid,"아이디를 ")){
    return false;
  }
  var vdid = /^[a-zA-Z0-9]{6,18}$/;
  if(!vdid.test(userid)){
    alert("아이디는 영문 대소문자와 숫자 6~18자리로 입력해야합니다!");
      form.userid.value="";
      form.userid.focus();
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
function checkUserCode(code){
  if(!checkExistData(code,"학번을 ")){
    return false;
  }
  var vdcode = /^[0-9]{4,7}/;
  if(!vdcode.test(code)){
    alert("학번이 있다면 학번을, 없다면 '9999'를 입력해주세요!");
      form.code.value="";
      form.code.focus();
      return false;
  }
  return true;
}
function checkUserPhone(userphone){
  if(!checkExistData(userphone,"핸드폰번호를 ")){
    return false;
  }
  var vdphone = /^[0-9]{11,12}/;
  if(!vdphone.test(userphone)){
    alert("핸드폰번호 11자리를 '-'없이 입력해주세요!");
      form.userphone.value="";
      form.userphone.focus();
      return false;
  }
  return true;
}

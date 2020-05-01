function checkid() {
  var userid = document.getElementById("uid").value;
  if (userid) {
    url = "check.php?userid=" + userid;
    window.open(url, "chkid", "width=300,height=100");
  } else {
    alert("아이디를 입력하세요");
  }
}

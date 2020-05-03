$(document).ready(function(){ // key를 눌렀다가 up 하면 함수 실행 됨.
  $("#uid").keyup(function(){ // 유효성 검사
    var vdid = /^[a-zA-Z0-9]{6,18}$/;
    if(!vdid.test($('#uid').val())) { //틀리면 검정색
      $('.row').html("규칙 준수").css("color", "#000000");
    }else{ //맞으면
    $.ajax({ //ajax로 php와 통신(?)
      url: './check.php?userid='+$('#uid').val(), //통신(?)할 URL 설정
      dataType: "text", // 데이터 타입 설정, 데이터의 경우 기본 GET/ 설정이 필요하면 type: "POST",
      success: function(data){ // 통신이 성공하면 데이터 값 비교
        if(data==0){ // 유저들의 id 값 row가 없으면 0, 그러므로 사용 가능 초록색
          $('.row').html("사용 가능").css("color", "#008000");
        }else if(data==1){ // 유저들의 id 값 row가 존재하면 1, 사용 불가 빨간색
          $('.row').html("사용 불가").css("color", "#FF0000");
        }
      },
      error:function(xhr, status, error){ // 통신 실패 시 오류 코드 출력
        $('.row').html('ERROR xhr: ' + xhr + ', status: ' + status + ', error: ' + error);
      }
    });
  }});
});

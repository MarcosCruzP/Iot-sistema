$('.btn').click(function(){
      $(this).toggleClass("click");
      $('.sidebar').toggleClass("show");
    });
      $('.feat-btn').click(function(){
        $('nav ul .feat-show').toggleClass("show");
        $('nav ul .first').toggleClass("rotate");
      });
      $('.serv-btn').click(function(){
        $('nav ul .serv-show').toggleClass("show1");
        $('nav ul .second').toggleClass("rotate");
      });
      $('.Opr-btn').click(function(){
        $('nav ul .Opr-show').toggleClass("show2");
        $('nav ul .three').toggleClass("rotate");
      });
      $('.conf-btn').click(function(){
        $('nav ul .conf-show').toggleClass("show3");
        $('nav ul .four').toggleClass("rotate");
      });
      $('nav ul li').click(function(){
        $(this).addClass("active").siblings().removeClass("active");
      });

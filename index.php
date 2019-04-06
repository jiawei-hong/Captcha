<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fake Captcha</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <style>
        #sub{
            width: 400px;
            height: 50px;
            border:1px solid red;
            margin:0 auto;
        }

        .ui-button{
            width: 35px;
            height: 30px;
            margin:10px 0 0 10px;
        }

        body{
            background-color:gray;
        }

        .active{
            display:none;
        }

        img{
            width: 100px;
            height: 100px;
        }
        
        #main{
            margin:0 auto;
            width: 420px;
        }

        .activeClick{
            transform:scale(0.9,0.9);
        }
        
        #check{
            width:100px;
        }

        #create{
            width: 100px;
        }
    </style>

    <script>
        $(function(){
            var ansCount = 0;
            var ansCategory = '';

            $('#create').click(function(){
                $('#main').toggleClass('active');
                $.get('./getimage.php?count=9',function(res){
                    $('#main').html(res);
                })

                ansCount = 0;
                if(!$('#main').hasClass('active')){
                    var span = document.createElement('span');
                    $.get('./getans.php',function(res){
                        span.innerText = '請選取相關的類別' + res;
                        $('#main img').each(function(){
                            if($(this).attr('alt') == res){
                                ansCategory = $(this).attr('alt');
                                ansCount++;
                            }
                        })
                    })                    
                    $('#sub').append(span);
                }else{
                    $('#sub>span').remove();
                }
            })

            $('#main').on('click','img',function(){
                $(this).toggleClass('activeClick');
            })

            $('#check').click(function(){                
                var records = 0;
                var recordError = 0;
                $('.activeClick').each(function(){
                    if($(this).attr('alt') == ansCategory){
                        records++;
                    }else{
                        recordError++;
                    }
                })
                alert(records == ansCount && recordError == 0 ? '驗證成功' : '驗證失敗');
            })
        })
    </script>
</head>
<body>
    <div id="sub">
        <button id="create" class="ui-button">創建</button>
    </div>
    <p><div id="main" class="active"></div></p>
    <div align="center">
        <button id="check" class="ui-button">驗證</button>
    </div>
</body>
</html>
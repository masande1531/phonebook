<? session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Phone Book</title>
       
        <meta charset="UTF-8" />
        <!-- Loading jQuery framework -->
        <script src="//code.jquery.com/jquery-latest.js" type="text/javascript"></script>

        <!-- The following styles are scripts are for styling this page and are not required to make this script function -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
        <style type="text/css">
            <!--
            .container {
                max-width: 800px;
            }
            .syntaxhighlighter.demo_code {
                max-width: 1100px;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            .demo_code .container:before, .demo_code .container:after {
                content: none;
            }
            .demo_code .container {
                max-width: 1100px;
            }
            -->
        </style>
        <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js" type="text/javascript"></script>
        <script src="http://alexgorbatchev.com/pub/sh/current/scripts/shCore.js" type="text/javascript"></script>
        <script type="text/javascript" src="http://alexgorbatchev.com/pub/sh/current/scripts/shBrushJScript.js"></script>
        <script type="text/javascript" src="http://alexgorbatchev.com/pub/sh/current/scripts/shBrushXml.js"></script>
        <script type="text/javascript" src="http://alexgorbatchev.com/pub/sh/current/scripts/shBrushPhp.js"></script>
        <link href="http://alexgorbatchev.com/pub/sh/current/styles/shCore.css" rel="stylesheet" type="text/css" />
        <link href="http://alexgorbatchev.com/pub/sh/current/styles/shThemeDefault.css" rel="stylesheet" type="text/css" />
        <!-- END Additional Styles/Scripts -->
    </head>
    <body>
        <div id="wrap">
            <div class="container">
                <div class="page-header"><h1 style="text-align: center">Phone Book</h1></div>
                 <?php
if( isset($_SESSION['error']) ){echo ' <div class="well" style="max-width: 400px; margin: 0 auto 10px;"><span id="error">'. $_SESSION['error'].'</span></div>'; unset($_SESSION['error']);}
if( isset($_SESSION['success']) ){echo '<div class="well" style="max-width: 400px; margin: 0 auto 10px;"><span id="error">'. $_SESSION['success'].'</span></div>'; unset($_SESSION['success']);}
?>
                <form class="form-horizontal" role="form" action="p_phonebook.php" method="post">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="first_name">First name</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="first_name" id="first_name"  />
                                           </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="last_name">Last name </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="last_name" id="last_name" />
                                               </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="email">email </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="email" id="email" />
                                             </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="cell_no">cell No# </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="cell_no" id="cell_no" />
                                             </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="Tel_no">Tell No# </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="tell_no" id="tell_no" />
                            <a href="#" class="btn btn-success btn-xs add-txt">Add More</a>
                                         </div>
                    </div>
                    
                    <input style="margin: 0 auto; width: 200px;" class="btn btn-primary btn-block" name="submit" type="submit" value="Submit" />
                </form>
                <p></p>
            </div>
        </div>
        <div class="well" style="max-width: 70%; margin: 0 auto 10px;"><?php    require_once 'view.php'; ?></div>
        <pre class="auto-links: false; brush: php; class-name: demo_code; collapse: true; html-script: true; toolbar: false;"></pre>
        <script type="text/javascript">
            SyntaxHighlighter.all();
            jQuery(document).ready(function($) {
                $("body").css('min-height', $(window).height() + 1);
                $(window).resize(function() {
                    $("body").css('min-height', $(window).height() + 1);
                });
              

                //Add More
                $(".form-horizontal .add-txt").click(function() {
                    var no = $(".form-group").length + 1;

                    var more_textbox = $('<div class="form-group">' +
                            '<label class="col-sm-2 control-label" for="txtbox' + no + '">Box <span class="label-numbers">' + no + '</span></label>' +
                            '<div class="col-sm-10"><input class="form-control" type="text" name="boxes[]" id="txtbox' + no + '" />' +
                            '<a href="#" class="btn btn-danger btn-xs remove-txt">Remove</a>' +
                            '</div></div>');
                    more_textbox.hide();
                    $(".form-group:last").after(more_textbox);
                    more_textbox.fadeIn("slow");
                    return false;
                });

                //Remove
                $('.form-horizontal').on('click', '.remove-txt', function() {
                    $(this).parent().parent().css('background-color', '#FF6C6C');
                    $(this).parent().parent().fadeOut("slow", function() {
                        $(this).parent().parent().css('background-color', '#FFFFFF');
                        $(this).remove();
                        $('.label-numbers').each(function(index) {
                            $(this).text(index + 1);
                        });
                    });
                    return false;
                });
            });
        </script>
    </body>
</html>

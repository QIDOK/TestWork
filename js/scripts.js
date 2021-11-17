$(function() {

    function arForm() {
        $("#arForm").submit(function(e) {
            e.preventDefault();
    
            $.ajax({
                type: "POST",
                url: "../includes/profile.php",
                data: $(this).serialize(),
            }).done(function(response) {
                response = JSON.parse(response);
                                
                if(response.status) {
                    $('#profile').children().remove();
                }
                
                $('.error').remove();
                $('#profile').append('<p class="error">' + response.element + '</p>');
            });
    
            return false;
        });
    }

    $('#login').click(function() {
        $('#profile').children().not('p').remove();
        $('#profile').append('<form id="arForm"><input type="text" name="login" placeholder="Почта"><input type="password" name="password" placeholder="Пароль"><input type="hidden" name="type" value="auth"><input type="submit"></form>');
    
        arForm();
    });

    $('#register').click(function() {
        $('#profile').children().not('p').remove();
        $('#profile').append('<form id="arForm"><input type="text" name="login" placeholder="Имя"><input type="text" name="mail" placeholder="Электронная почта"><input type="password" name="password" placeholder="Пароль"><input type="password" name="passwordRepeat" placeholder="Повтор пароля"><input type="hidden" name="type" value="register"><input type="submit"></form>');
    
        arForm();
    });

});
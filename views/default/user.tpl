{*шаблон страницы пользователя # 4,4 min 30 sec 21 *}
<h1> Ваши регистрационные данные  </h1>
 
        
            <table border="0">
                <tbody>
            <tr>
                <td> Логин(email) </td>
                <td> {$arUser['email']} </td> {* в index.php  инициализируем пременную *}
                 
            </tr>
            
            <tr>
                <td> Имя </td>
                <td> <input type="text" id="newName" value="{$arUser['name']}" </td>
                 
            </tr>
            
            <tr>
                <td> Aдрес </td>
                <td> <textarea id="newAdress" >{$arUser['adress']}</textarea> </td>
                 
            </tr>
            
            <tr>
                <td> Новый пароль </td>
                <td> <input type="password" id="newPwd1" value="" </td>
            </tr>
            <tr>
                <td> Повтор пароля </td>
                <td> <input type="password" id="newPwd2" value="" </td>
            </tr>
            <tr>
                <td> Для того чтобы сохранить текущие данные ввидите пароль </td>
                <td> <input type="password" id="curPwd" value="" </td>
            </tr>
            
            <tr>
                <td>&nbsp;</td>
                <td> <input type="button"  value="Сохранить изменения" onClick="updateUserData();"</td>
            </tr>
                </tbody>
            </table>
           
    
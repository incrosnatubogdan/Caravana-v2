var access_token = '';
function getAccessToken(){
    console.log(123)
    $.post('https://www.googleapis.com/oauth2/v3/token?code=4/7wAXcJOsX5D7vp9olPVRbNn7blmCKiKAa1uVxDkNXGhzGFgm8BH-QEjlZMSrPDQtME29uORWfB6gd3lfT9RHdJo=243018700882-lael3g8qoml31erhkolekb1haj69tt0c.apps.googleusercontent.com&client_secret=EDCFG69xAN7Eyp8Q9YE9IQkY&redirect_uri=http://caravanacumedici.ro&grant_type=authorization_code', {
            client_id: {{client_id}},
            client_secret: {{client_secret}},
            grant_type: 'refresh_token',
            refresh_token: {{refresh_token}}
        }, function (data, status) {
            if (status === 'success') {
                access_token = data.access_token;
                // Do something eith the access_token
            }
            else {
                console.error(status);
            }
        });
}

$(document).ready(function () {
    console.log(123)
    getAccessToken()
}
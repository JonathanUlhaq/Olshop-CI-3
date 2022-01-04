<div id="result" class="card" style="width: 100%; color: black">

    <div class="card-body">
        <form action="<?= base_url(); ?>Autentikasi/login_proccess" method="POST">
            <h5 style="padding-bottom: 10%;" class="card-title">Log in</h5>
            <p style="padding-bottom: 5%;" class="card-text"><label>Username</label><input type="text" name="username" class="form-control"></p>
            <p style="padding-bottom: 1%;" class="card-text"><label>Password</label><input type="password" name="password" class="form-control"></p>
            <input type="submit" class="btn btn-danger form-control" value="LOG IN">
            <a style="font-size: 80%;" id="daftar" href="#">Daftar Member</a>
        </form>
    </div>
</div>
<script>
    var daftar = document.getElementById('daftar')
    var result = document.getElementById('result')

    daftar.addEventListener('click', function() {
        var xhr = new XMLHttpRequest()

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                result.innerHTML = xhr.responseText
            }
        }

        xhr.open('GET', 'http://localhost/CI_3/olshop/Autentikasi/register', true)
        xhr.send()
    })
</script>
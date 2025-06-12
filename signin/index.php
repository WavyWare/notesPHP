<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie - todo php</title>
    <link rel="stylesheet" href="http://localhost/php/src/output.css" />
</head>
<body data-theme="dark">

    <div class="flex h-screen w-screen justify-center items-center flex-col space-y-4 bg-base-200 p-4">
        
        <form class="flex flex-col space-y-4 bg-base-100 border border-base-300 p-8 rounded-2xl shadow-lg w-full max-w-md" method="post" action="http://localhost/php/routes/signin.php">
            
            <h1 class="text-4xl font-bold text-center mb-2">Zaloguj się 👋</h1>
            <p class="text-center text-base-content/70 mb-6">Wpisz swoje dane, aby kontynuować.</p>
            
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Adres e-mail</span>
                </label>
                <input name="email" placeholder="np. jan.kowalski@email.com" type="email" class="input input-bordered w-full" required />
            </div>
            
            <div class="form-control">
                 <label class="label">
                    <span class="label-text">Hasło</span>
                    <a href="#" class="label-text-alt link link-hover">Nie pamiętasz hasła?</a>
                </label>
                <input name="password" placeholder="••••••••" type="password" class="input input-bordered w-full" required />
            </div>
            
            <div class="form-control pt-4">
                <input type="submit" name="submit" value="Zaloguj się" class="btn btn-primary w-full"/>
            </div>

            <div class="divider text-sm text-base-content/50">Nie masz konta?</div>

            <div class="form-control">
                 <a href="./../register" class="btn btn-outline btn-primary w-full">Zarejestruj się</a>
            </div>

        </form>
        
        <a href="./../" class="text-sm text-base-content/70 hover:text-primary transition-colors">Wróć do strony głównej</a>
    </div>

</body>
</html>
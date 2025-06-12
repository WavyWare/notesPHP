<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="./../src/output.css" />
</head>
<body data-theme="dark">
    <div class="flex h-screen w-screen justify-center items-center flex-col space-y-3 bg-base-200">
        <form id="signup-form" class="flex flex-col space-y-3 border bg-base-100 border-base-300 p-6 rounded-2xl w-full max-w-md shadow-lg" method="post" action="http://localhost/php/routes/register.php" novalidate>
            <h1 class="text-4xl text-center mb-4 font-bold">Zarejestruj się 📝</h1>
            
            <div class="form-control">
                <input id="name" name="name" placeholder="Nazwa użytkownika" type="text" class="input input-bordered w-full"/>
                <label class="label h-4">
                    <span id="name-error" class="label-text-alt text-error"></span>
                </label>
            </div>

            <div class="form-control">
                <input id="email" name="email" placeholder="Adres e-mail" type="email" class="input input-bordered w-full"/>
                <label class="label h-4">
                    <span id="email-error" class="label-text-alt text-error"></span>
                </label>
            </div>

            <div class="form-control">
                <input id="password" name="password" placeholder="Hasło" type="password" class="input input-bordered w-full" />
                 <div class="mt-2 h-2 rounded-full bg-base-200 overflow-hidden">
                    <div id="password-strength-bar" class="h-full rounded-full transition-all duration-300"></div>
                </div>
                 <label class="label h-4">
                    <span id="password-error" class="label-text-alt text-error"></span>
                </label>
            </div>
            
            <div class="form-control">
                <input id="repeatpassword" name="repeatpassword" placeholder="Powtórz hasło" type="password" class="input input-bordered w-full"/>
                <label class="label h-4">
                    <span id="repeatpassword-error" class="label-text-alt text-error"></span>
                </label>
            </div>

            <div class="text-xs text-base-content/70 p-3 my-2 rounded-lg bg-base-200/60">
                <p class="font-bold mb-1">Hasło musi spełniać przynajmniej 4 z 5 warunków:</p>
                <ul class="list-disc list-inside space-y-0.5">
                    <li id="cond-len8">Długość ponad 8 znaków</li>
                    <li id="cond-len14">Długość ponad 14 znaków</li>
                    <li id="cond-uppercase">Co najmniej jedna duża litera (A-Z)</li>
                    <li id="cond-digit">Co najmniej jedna cyfra (0-9)</li>
                    <li id="cond-special">Co najmniej jeden znak specjalny (!@#$...)</li>
                </ul>
            </div>


            <input type="submit" name="submit" value="Zarejestruj" class="btn btn-primary"/>
            
        </form>
        <a href="./../" class="text-gray-500 hover:text-primary transition-colors">Wróć do strony głównej</a>
    </div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('signup-form');
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const repeatPasswordInput = document.getElementById('repeatpassword');

    const nameError = document.getElementById('name-error');
    const emailError = document.getElementById('email-error');
    const passwordError = document.getElementById('password-error');
    const repeatPasswordError = document.getElementById('repeatpassword-error');

    const strengthBar = document.getElementById('password-strength-bar');
    const passwordInfoItems = {
        len8: document.getElementById('cond-len8'),
        len14: document.getElementById('cond-len14'),
        uppercase: document.getElementById('cond-uppercase'),
        digit: document.getElementById('cond-digit'),
        special: document.getElementById('cond-special'),
    };
    

    
    const checkPasswordStrength = (password) => {
        let score = 0;
        const conditions = {
            len8: password.length > 8,
            len14: password.length > 14,
            uppercase: /[A-Z]/.test(password),
            digit: /[0-9]/.test(password),
            special: /[!@#$%^&*(),.?":{}|<>]/.test(password),
        };

        Object.values(conditions).forEach(isMet => {
            if (isMet) score++;
        });
        
        return { score, conditions };
    };
    
    const updatePasswordUI = (password) => {
        const { score, conditions } = checkPasswordStrength(password);
        
        const strengthLevels = {
            0: { width: '0%', color: 'bg-transparent' },
            1: { width: '20%', color: 'bg-error' },
            2: { width: '40%', color: 'bg-error' },
            3: { width: '60%', color: 'bg-warning' },
            4: { width: '80%', color: 'bg-success' },
            5: { width: '100%', color: 'bg-success' },
        };
        
        const level = strengthLevels[score] || strengthLevels[0];
        strengthBar.style.width = level.width;
        strengthBar.className = `h-full rounded-full transition-all duration-300 ${level.color}`;

        for (const key in conditions) {
            const el = passwordInfoItems[key];
            if (conditions[key]) {
                el.classList.add('text-success', 'font-semibold');
                el.classList.remove('text-base-content/70');
            } else {
                el.classList.remove('text-success', 'font-semibold');
                el.classList.add('text-base-content/70');
            }
        }
    };
    
    passwordInput.addEventListener('input', (e) => {
        updatePasswordUI(e.target.value);
    });
    
    const validateField = (input, errorElement, validationFn, errorMessage) => {
        const isValid = validationFn(input.value);
        errorElement.textContent = isValid ? '' : errorMessage;
        input.classList.toggle('input-error', !isValid);
        return isValid;
    };

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        
        // Walidacja poszczególnych pól
        const isNameValid = validateField(
            nameInput, nameError, (val) => val.length > 3, 'Nazwa musi mieć więcej niż 3 znaki.'
        );

        const isEmailValid = validateField(
            emailInput, emailError, (val) => /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(val), 'Proszę podać poprawny adres e-mail.'
        );
        
        const { score } = checkPasswordStrength(passwordInput.value);
        const isPasswordStrongEnough = validateField(
            passwordInput, passwordError, () => score >= 4, 'Hasło jest za słabe. Spełnij min. 4 warunki.'
        );

        const doPasswordsMatch = validateField(
            repeatPasswordInput, repeatPasswordError, (val) => val === passwordInput.value, 'Hasła nie są identyczne.'
        );
        
        if (isNameValid && isEmailValid && isPasswordStrongEnough && doPasswordsMatch) {
        form.submit();
    }
    });
});
</script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./src/output.css" />
</head>
  <body>
    <?php echo password_hash("qwerty", PASSWORD_DEFAULT);
    ?>
      <div class="bg-base-100">
      <main>
          <div class="hero min-h-[60vh] bg-base-200">
              <div class="hero-content text-center">
                  <div class="max-w-2xl">
                      <h1 class="text-5xl font-bold leading-tight">Zorganizuj swoje myśli i zadania w jednym miejscu.</h1>
                      <p class="py-6 text-lg">Prostota i moc w jednej aplikacji. Skup się na tym, co najważniejsze, a my zadbamy o resztę. Twoje notatki i listy zadań, zawsze pod ręką.</p>
                      <a href="./register" class="btn btn-outline btn-primary btn-lg">Zarejestruj się</a>
                      <a href="./signin" class="btn btn-primary btn-lg">Zacznij teraz za darmo</a>
                      
                  </div>
              </div>
          </div>

          <div class="container mx-auto px-4 py-20">
              <div class="text-center mb-12">
                  <h2 class="text-4xl font-bold">Wszystko, czego potrzebujesz</h2>
                  <p class="text-base-content/70 mt-2">Odkryj funkcje, które ułatwią Ci życie.</p>
              </div>
              
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                  <div class="card bg-base-100 shadow-xl border border-base-200 hover:border-primary transition-all duration-300 transform hover:-translate-y-1">
                      <div class="card-body items-center text-center">
                          <div class="p-4 bg-primary/10 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                          </div>
                          <h3 class="card-title mt-4">Szybkie Notatki</h3>
                          <p>Zapisuj pomysły, gdy tylko wpadną Ci do głowy. Prosty i intuicyjny edytor pozwoli Ci uchwycić każdą myśl.</p>
                      </div>
                  </div>
                  
                  <div class="card bg-base-100 shadow-xl border border-base-200 hover:border-primary transition-all duration-300 transform hover:-translate-y-1">
                      <div class="card-body items-center text-center">
                          <div class="p-4 bg-primary/10 rounded-full">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                          </div>
                          <h3 class="card-title mt-4">Inteligentne Listy Zadań</h3>
                          <p>Planuj swój dzień, tydzień i miesiąc. Ustawiaj priorytety i oznaczaj wykonane zadania, aby śledzić postępy.</p>
                      </div>
                  </div>

                  <div class="card bg-base-100 shadow-xl border border-base-200 hover:border-primary transition-all duration-300 transform hover:-translate-y-1">
                      <div class="card-body items-center text-center">
                          <div class="p-4 bg-primary/10 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                            </svg>
                          </div>
                          <h3 class="card-title mt-4">Pełna Organizacja</h3>
                          <p>Twórz kategorie i tagi, aby łatwo zarządzać swoimi notatkami. Znajdź wszystko w mgnieniu oka dzięki wyszukiwarce.</p>
                      </div>
                  </div>
              </div>
          </div>

          <div class="bg-base-200 py-20">
              <div class="container mx-auto px-4 text-center">
                  <h2 class="text-4xl font-bold mb-4">Zobacz, jakie to proste</h2>
                  <p class="text-base-content/70 max-w-2xl mx-auto mb-12">Przyjazny interfejs, który nie przytłacza. Skup się na treści, a nie na obsłudze narzędzia.</p>
                  <div class="mockup-window border bg-base-300 max-w-4xl mx-auto shadow-2xl">
                      <div class="flex justify-start px-4 py-8 bg-base-100">
                          <div class="w-full">
                              <h3 class="text-2xl font-bold text-left mb-4 px-4">✅ Zadania na dziś</h3>
                              <div class="space-y-3">
                                  <div class="flex items-center gap-4 p-3 rounded-lg bg-base-200">
                                      <input type="checkbox" checked="checked" class="checkbox checkbox-primary" />
                                      <span class="line-through text-base-content/50">Zaprojektować stronę główną</span>
                                  </div>
                                  <div class="flex items-center gap-4 p-3 rounded-lg bg-base-200">
                                      <input type="checkbox" class="checkbox checkbox-primary" />
                                      <span>Napisać dokumentację API</span>
                                  </div>
                                  <div class="flex items-center gap-4 p-3 rounded-lg bg-base-200">
                                      <input type="checkbox" class="checkbox checkbox-primary" />
                                      <span>Kupić mleko i chleb</span>
                                  </div>
                                  <div class="flex items-center gap-4 p-3 rounded-lg bg-base-200">
                                      <input type="checkbox" class="checkbox checkbox-primary" />
                                      <span>Zadzwonić do klienta w sprawie projektu</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </main>

      <footer class="footer footer-center p-4 bg-base-300 text-base-content">
          <aside>
              <p>Copyright © 2025 - Wszelkie prawa zastrzeżone przez <strong>todo php</strong></p>
          </aside>
      </footer>
  </div>

</body>
</html>
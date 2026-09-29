{{-- 
    navigation.blade.php — Smart router navbar
    Secara otomatis memuat navbar yang sesuai berdasarkan role user yang sedang login.
    - Inovator (role: inovator)   → navigation-inovator.blade.php (putih, badge biru)
    - Evaluator (role: evaluator/admin) → navigation-evaluator.blade.php (slate gelap, badge indigo)
--}}

@auth
    @if(Auth::user()->isEvaluator())
        @include('layouts.navigation-evaluator')
    @else
        @include('layouts.navigation-inovator')
    @endif
@endauth

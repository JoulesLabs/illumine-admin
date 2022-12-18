<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; {{date('Y')}} <div class="bullet"></div> By <a href="{{ route('admin::home') }}">{{ config('illumineadmin.app_name') }}</a>
    </div>
    <div class="footer-right">
       {{ config('illumineadmin.version') }}
    </div>
</footer>

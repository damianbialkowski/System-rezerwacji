<footer class="bg-dark pt-5 mt-4 pb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <span class="text-bold text-light">Details</span>
                <ul class="text-light p-0 mt-2 ml-0">
                    <li>
                        <a href="{{ route('Front::cms.profile') }}" style="color: #fff">My account</a>
                    </li>
                    <li>
                        <a href="{{ route('Front::booking.reservations.index') }}" style="color: #fff">Reservations</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
        </div>
        <hr class="text-light">
        <div class="d-flex justify-content-between mt-4">
            <span class="text-light">&copy; Copyrights {{ date('Y') }}</span>
            <span class="text-light">by Booking</span>
        </div>
    </div>
</footer>

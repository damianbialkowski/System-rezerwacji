<div class="bg-gray">
    <div class="container pt-5 mb-4">
        <div class="pb-4 profile d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <div class="initials fs-4">{{ ucfirst($user->username[0]) }}</div>
                <div class="ms-3">
                    <h1 class="fw-bold fs-5 m-0">{{ $user->username }}</h1>
                    <small>Account since: <b>{{ $user->created_at->format('d-m-Y') }}r.</b></small>
                </div>
            </div>
        </div>
    </div>
</div>

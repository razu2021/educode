
@if($priceData['is_discount_active'] && $priceData['valid_until'])
    <div class="text-warning fw-bold">
        <p class="countdown-timer text-info"
           data-end="{{ \Carbon\Carbon::parse($priceData['valid_until'])->toIso8601String() }}">
            ⏳ Loading timer...
        </p>
    </div>
@endif


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const countdownEls = document.querySelectorAll('.countdown-timer');

        countdownEls.forEach(el => {
            const endTime = new Date(el.getAttribute('data-end')).getTime();

            function updateCountdown() {
                const now = new Date().getTime();
                const distance = endTime - now;

                if (distance <= 0) {
                    el.innerHTML = "⚠️ Discount ended.";
                    return;
                }

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                el.innerHTML = `Discount End at : ${days}d ${hours}h ${minutes}m ${seconds}s left`;
            }

            updateCountdown();
            setInterval(updateCountdown, 1000);
        });
    });
</script>


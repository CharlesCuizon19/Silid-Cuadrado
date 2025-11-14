@props(['product'])

<div x-data="{ open: false, agreed: false }" x-effect="document.body.classList.toggle('overflow-hidden', open)" class="relative z-40">

    <!-- Trigger Button -->
    <button
        class="relative flex items-center justify-center px-1 transition duration-300 cursor-pointer -z-10 w-fit group"
        @click="open = true">
        <div
            class="relative z-10 overflow-hidden w-fit lg:px-8 px-4 py-2 lg:py-4 flex items-center justify-center font-medium text-black bg-[#f37021] group transition duration-300">
            <span class="text-sm font-light text-white lg:text-base poppins-regular">Inquire Now</span>
            <span
                class="absolute -z-10 inset-0 w-0 bg-black/50 skew-x-[-15deg] -left-4 transition-all duration-300 ease-in-out group-hover:w-[calc(100%+30px)] opacity-70"></span>
        </div>
        <div
            class="absolute w-full h-4 lg:h-6 px-[65px] lg:px-[71px] border-black border-t border-l border-r group-hover:border-2 -top-1">
        </div>
        <div
            class="absolute w-full h-4 lg:h-6 px-[65px] lg:px-[71px] border-black border-b border-l border-r group-hover:border-2 -bottom-1">
        </div>
    </button>

    <!-- Overlay -->
    <div x-show="open" x-transition.opacity class="fixed inset-0 z-40 bg-black/50" @click="open = false"></div>

    <!-- Modal -->
    <div x-show="open" x-transition x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4"
        aria-modal="true">

        <div
            class="relative z-10 w-full h-full overflow-y-scroll overflow-x-hidden max-w-3xl max-h-[85%] mt-20 bg-white shadow-xl rounded-2xl">

            <!-- Header -->
            <div
                class="sticky top-0 z-20 flex items-center justify-between px-6 py-4 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-900 poppins-regular">Product Inquiry</h2>
                <button @click="open = false" class="text-2xl leading-none text-gray-400 hover:text-gray-700">
                    ✕
                </button>
            </div>

            <!-- Content -->
            <div class="p-6">
                <!-- Product Info -->
                <div class="flex flex-col gap-4 p-3 mb-5 rounded-md lg:flex-row bg-gray-50">
                    <img src="{{ asset($product->thumbnail) }}" alt="{{ $product->title }}"
                        class="object-cover w-full lg:w-[250px] h-auto rounded-md">
                    <div class="flex flex-col justify-center">
                        <span class="text-xs text-[#f37021] font-bold uppercase tracking-wide poppins-regular">
                            {{ $product->category->category_name ?? 'Uncategorized' }}
                        </span>
                        <h3 class="text-2xl font-bold magistral-medium">{{ $product->title }}</h3>
                        <p class="text-base leading-snug poppins-regular">{!! $product->description !!}</p>
                    </div>
                </div>

                <!-- Inquiry Form -->
                <form x-ref="form" @submit.prevent="submitInquiry($refs.form, () => { open = false })"
                    class="space-y-10 poppins-regular">

                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="product_name" value="{{ $product->title }}">

                    <div>
                        <label class="block mb-1 text-lg font-bold text-black">Full Name <span
                                class="text-[#f37021]">*</span></label>
                        <input type="text" name="full_name"
                            class="w-full border-b border-gray-300 focus:border-[#f37021] outline-none py-2"
                            placeholder="Enter your full name" required>
                    </div>

                    <div>
                        <label class="block mb-1 text-lg font-bold text-black">Email Address <span
                                class="text-[#f37021]">*</span></label>
                        <input type="email" name="email"
                            class="w-full border-b border-gray-300 focus:border-[#f37021] outline-none py-2"
                            placeholder="Enter your email address" required>
                    </div>

                    <div>
                        <label class="block mb-1 text-lg font-bold text-black">Phone No. <span
                                class="text-[#f37021]">*</span></label>
                        <input type="tel" name="phone"
                            class="w-full border-b border-gray-300 focus:border-[#f37021] outline-none py-2"
                            placeholder="Enter your phone number" required>
                    </div>

                    <div>
                        <label class="block mb-1 text-lg font-bold text-black">Message <span
                                class="text-sm text-[#f37021]">(optional)</span></label>
                        <textarea name="message" class="w-full border-b border-gray-300 focus:border-[#f37021] outline-none py-2 resize-none"
                            rows="4" placeholder="Enter your message"></textarea>
                    </div>

                    <!-- Confirmation -->
                    <div class="flex items-start gap-2 mt-5">
                        <input type="checkbox" id="confirm" x-model="agreed"
                            class="mt-1 w-4 h-4 text-[#f37021] border-gray-300 rounded focus:ring-[#f37021]" required>
                        <label for="confirm" class="text-sm leading-snug text-gray-700">
                            I confirm that the information provided is accurate and agree to be contacted by <span
                                class="font-semibold">SILID CUADRADO</span>.
                        </label>
                    </div>

                    {{-- ✅ Google reCAPTCHA --}}
                    <div class="mb-6">
                        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITEKEY') }}"></div>
                        @error('g-recaptcha-response')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center gap-4 mt-6">
                        <button type="submit" :disabled="!agreed"
                            class="relative z-40 flex items-center justify-center px-1 transition duration-300 cursor-pointer w-fit group">
                            <div :class="agreed ? 'bg-[#f37021]' : 'bg-gray-300 text-gray-500 cursor-not-allowed'"
                                class="relative z-10 flex items-center justify-center px-8 py-4 overflow-hidden font-medium text-black transition duration-300 w-fit group">
                                <span class="font-light text-white poppins-regular">Inquire Now</span>
                            </div>
                        </button>

                        <button type="button" @click="open = false"
                            class="relative z-40 flex items-center justify-center px-1 transition duration-300 cursor-pointer w-fit group">
                            <div
                                class="relative z-10 flex items-center justify-center px-8 py-4 overflow-hidden font-medium text-black transition duration-300 bg-gray-400 w-fit group">
                                <span class="font-light text-white poppins-regular">Cancel</span>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function submitInquiry(form, closeModal) {
        const recaptchaResponse = grecaptcha.getResponse();

        // ✅ Check reCAPTCHA before submitting
        if (!recaptchaResponse) {
            Swal.fire({
                icon: 'warning',
                title: 'Please verify',
                text: 'Confirm that you are not a robot.',
                confirmButtonColor: '#f37021'
            });
            return;
        }

        const formData = new FormData(form);
        formData.append('g-recaptcha-response', recaptchaResponse);

        const submitUrl = "{{ route('product_inquiries.store') }}";
        const csrfToken = "{{ csrf_token() }}";

        fetch(submitUrl, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Inquiry Sent!',
                        text: 'Your product inquiry has been successfully submitted.',
                        confirmButtonColor: '#f37021',
                        timer: 2500
                    });
                    form.reset();
                    grecaptcha.reset(); // ✅ reset captcha
                    closeModal();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: data.message || 'Something went wrong.',
                        confirmButtonColor: '#f37021'
                    });
                }
            })
            .catch(() => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Unable to submit inquiry. Please try again later.',
                    confirmButtonColor: '#f37021'
                });
            });
    }
</script>

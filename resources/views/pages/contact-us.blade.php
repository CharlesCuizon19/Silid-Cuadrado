@extends('layouts.app')

@section('content')
    <div>
        <x-banner page='Contact Us' extension1=">" breadcrumb1='Contact Us' img='images/contact-us-banner.png' />

        <div class="h-full">
            <div class="grid grid-cols-1 2xl:grid-cols-2 poppins-regular">
                <div class="relative bg-[#f2f2f2]">
                    <img src="{{ asset('images/contactus-bg.png') }}" alt="" class="w-full h-auto mix-blend-multiply">
                    <div class="absolute inset-0 flex items-center justify-center h-full p-[5rem]" data-aos="fade-right">
                        <div class="space-y-16">
                            <div class="flex flex-col gap-5">
                                <div class="text-lg font-bold uppercase">
                                    Get in touchh
                                </div>
                                <div class="magistral text-5xl w-[70%] text-[#f37021]">
                                    Reach Out for Any Questions or Inquiries
                                </div>
                            </div>
                            <div class="flex flex-col gap-5 text-2xl">
                                <div class="flex items-center gap-2">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="text-[#f37021] size-8">
                                            <g fill="none">
                                                <path
                                                    d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                                <path fill="currentColor"
                                                    d="M12 2a9 9 0 0 1 9 9c0 3.074-1.676 5.59-3.442 7.395a20.4 20.4 0 0 1-2.876 2.416l-.426.29l-.2.133l-.377.24l-.336.205l-.416.242a1.87 1.87 0 0 1-1.854 0l-.416-.242l-.52-.32l-.192-.125l-.41-.273a20.6 20.6 0 0 1-3.093-2.566C4.676 16.589 3 14.074 3 11a9 9 0 0 1 9-9m0 6a3 3 0 1 0 0 6a3 3 0 0 0 0-6" />
                                            </g>
                                        </svg>
                                    </div>
                                    <div>
                                        Bacoor Cavite , Bacoor, Philippines, 4102
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="text-[#f37021] size-8">
                                            <path fill="currentColor"
                                                d="m19.23 15.26l-2.54-.29a1.99 1.99 0 0 0-1.64.57l-1.84 1.84a15.05 15.05 0 0 1-6.59-6.59l1.85-1.85c.43-.43.64-1.03.57-1.64l-.29-2.52a2 2 0 0 0-1.99-1.77H5.03c-1.13 0-2.07.94-2 2.07c.53 8.54 7.36 15.36 15.89 15.89c1.13.07 2.07-.87 2.07-2v-1.73c.01-1.01-.75-1.86-1.76-1.98" />
                                        </svg>
                                    </div>
                                    <div>
                                        09 123456789
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="text-[#f37021] size-8">
                                            <path fill="currentColor"
                                                d="m19.23 15.26l-2.54-.29a1.99 1.99 0 0 0-1.64.57l-1.84 1.84a15.05 15.05 0 0 1-6.59-6.59l1.85-1.85c.43-.43.64-1.03.57-1.64l-.29-2.52a2 2 0 0 0-1.99-1.77H5.03c-1.13 0-2.07.94-2 2.07c.53 8.54 7.36 15.36 15.89 15.89c1.13.07 2.07-.87 2.07-2v-1.73c.01-1.01-.75-1.86-1.76-1.98" />
                                        </svg>
                                    </div>
                                    <div>
                                        09 987654321
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="text-[#f37021] size-8">>
                                            <path fill="currentColor"
                                                d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2m0 4l-8 5l-8-5V6l8 5l8-5z" />
                                        </svg>
                                    </div>
                                    <div>
                                        silidcuadrad0@gmail.com
                                    </div>
                                </div>
                            </div>
                            <div class="border border-[#FFCDAE]">
                                <iframe class="w-full h-[380px]"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15455.40417242392!2d120.94319166260966!3d14.43574655681651!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d26f7c8a8137%3A0x5b3b0856be71835!2sBacoor%2C%204102%20Cavite!5e0!3m2!1sen!2sph!4v1761623379408!5m2!1sen!2sph"
                                    style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative bg-white">
                    <img src="{{ asset('images/contactus-bg2.png') }}" alt=""
                        class="w-full h-auto mix-blend-multiply">

                    <div class="absolute inset-0 flex items-center justify-center h-full p-[5rem]">
                        <form class="w-full space-y-14 poppins-regular" x-data="contactForm()" @submit.prevent="submitForm"
                            data-aos="fade-left">

                            <div>
                                <label class="block mb-1 text-lg font-bold text-black">
                                    Full Name <span class="text-[#f37021]">*</span>
                                </label>
                                <input type="text" x-model="full_name"
                                    class="w-full bg-transparent border-b border-gray-300 focus:border-[#f37021] outline-none py-2"
                                    placeholder="Enter your full name" required>
                            </div>

                            <div>
                                <label class="block mb-1 text-lg font-bold text-black">
                                    Email Address <span class="text-[#f37021]">*</span>
                                </label>
                                <input type="email" x-model="email"
                                    class="w-full bg-transparent border-b border-gray-300 focus:border-[#f37021] outline-none py-2"
                                    placeholder="Enter your email address" required>
                            </div>

                            <div>
                                <label class="block mb-1 text-lg font-bold text-black">
                                    Subject <span class="text-[#f37021]">*</span>
                                </label>
                                <input type="text" x-model="subject"
                                    class="w-full border-b bg-transparent border-gray-300 focus:border-[#f37021] outline-none py-2"
                                    placeholder="Enter your subject" required>
                            </div>

                            <div>
                                <label class="block mb-1 text-lg font-bold text-black">
                                    Message <span class="text-[#f37021]">*</span>
                                </label>
                                <textarea x-model="message"
                                    class="w-full bg-transparent border-b border-gray-300 focus:border-[#f37021] outline-none py-2 resize-none"
                                    rows="4" placeholder="Enter your message" required></textarea>
                            </div>

                            {{-- ✅ Google reCAPTCHA --}}
                            <div class="mb-6">
                                <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITEKEY') }}"></div>
                                @error('g-recaptcha-response')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit"
                                class="relative z-40 flex items-center justify-center px-1 transition duration-300 cursor-pointer w-fit group">
                                <div
                                    class="relative z-10 flex items-center justify-center px-8 py-4 overflow-hidden font-medium text-black transition duration-300 bg-[#f37021] w-fit group">
                                    <span class="text-white poppins-regular">
                                        Submit Message
                                    </span>
                                    <span
                                        class="absolute -z-10 inset-0 w-0 bg-black/50 skew-x-[-15deg] -left-4 transition-all duration-300 ease-in-out group-hover:w-[calc(100%+30px)] opacity-70"></span>
                                </div>
                                <div
                                    class="absolute w-full h-6 px-[65px] border-black border-t border-l border-r group-hover:border-r-2 group-hover:border-l-2 group-hover:border-t-2 -top-1">
                                </div>
                                <div
                                    class="absolute w-full h-6 px-[65px] border-black border-b border-l border-r -bottom-1 group-hover:border-b-2 group-hover:border-l-2 group-hover:border-r-2">
                                </div>
                                <div
                                    class="absolute bottom-0 z-20 w-[6px] h-[6px] bg-white right-1 group-hover:flex hidden transition duration-300">
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ✅ Google reCAPTCHA script --}}
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('contactForm', () => ({
                full_name: '',
                email: '',
                subject: '',
                message: '',

                async submitForm() {
                    try {
                        // ✅ Get reCAPTCHA token
                        const recaptchaToken = grecaptcha.getResponse();

                        if (!recaptchaToken) {
                            Swal.fire({
                                title: 'Verification required',
                                text: 'Please verify that you are not a robot.',
                                icon: 'warning',
                                confirmButtonColor: '#f37021'
                            });
                            return;
                        }

                        const response = await fetch("{{ route('contacts.store') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": '{{ csrf_token() }}',
                                "Accept": "application/json"
                            },
                            body: JSON.stringify({
                                full_name: this.full_name,
                                email: this.email,
                                subject: this.subject,
                                message: this.message,
                                'g-recaptcha-response': recaptchaToken // ✅ include token
                            })
                        });

                        if (!response.ok) throw new Error(await response.text());

                        const result = await response.json();

                        Swal.fire({
                            title: 'Message Sent!',
                            text: result.message ??
                                'Your inquiry has been sent successfully!',
                            icon: 'success',
                            confirmButtonColor: '#f37021'
                        });

                        // ✅ Reset form
                        this.full_name = this.email = this.subject = this.message = '';
                        grecaptcha.reset();

                    } catch (error) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Something went wrong. Please try again later.',
                            icon: 'error',
                            confirmButtonColor: '#f37021'
                        });
                    }
                }
            }));
        });
    </script>
@endsection

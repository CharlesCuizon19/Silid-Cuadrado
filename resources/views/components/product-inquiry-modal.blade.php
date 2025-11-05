@props([
'product' => [],
])

<div x-data="{
    open: false,
}"
    x-effect="
        // When 'open' changes, toggle scroll lock
        document.body.classList.toggle('overflow-hidden', open)
    "
    class="relative z-50">
    <!-- Button -->
    <button
        class="relative z-40 flex items-center justify-center px-1 transition duration-300 cursor-pointer w-fit group"
        @click="open = true">
        <div
            class="relative z-10 overflow-hidden w-fit 2xl:px-8 px-4 py-2 2xl:py-4 flex items-center justify-center font-medium text-black group bg-[#f37021] transition duration-300">
            <span class="text-sm font-light text-white 2xl:text-base poppins-regular">
                Inquire Now
            </span>
            <span
                class="absolute -z-10 inset-0 w-0 bg-black/50 skew-x-[-15deg] -left-4 transition-all duration-300 ease-in-out group-hover:w-[calc(100%+30px)] opacity-70"></span>
        </div>
        <div
            class="absolute w-full h-4 2xl:h-6 px-[65px] 2xl:px-[71px] border-black border-t border-l border-r group-hover:border-r-2 group-hover:border-l-2 group-hover:border-t-2 -top-1">
        </div>
        <div
            class="absolute w-full h-4 2xl:h-6 px-[65px] 2xl:px-[71px] border-black border-b border-l border-r -bottom-1 group-hover:border-b-2 group-hover:border-l-2 group-hover:border-r-2">
        </div>
        <div
            class="absolute bottom-0 z-20 w-[6px] h-[6px] bg-white right-1 group-hover:flex hidden transition duration-300">
        </div>
    </button>

    <!-- Overlay -->
    <div x-show="open" x-transition.opacity class="fixed inset-0 z-40 bg-black/50" @click="open = false">
    </div>

    <!-- Modal -->
    <div x-show="open" x-transition class="fixed inset-0 z-50 flex items-center justify-center p-4" aria-modal="true"
        x-cloak>
        <div
            class="relative z-10 w-full h-full overflow-y-scroll overflow-x-hidden max-w-3xl max-h-[90%] bg-white shadow-xl">
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
                <div class="flex flex-col gap-4 p-3 mb-5 rounded-md 2xl:flex-row">
                    <img src="{{ asset($product->thumbnail) }}" alt=""
                        class="object-cover w-full 2xl:w-[250px] h-auto">
                    <div class="flex flex-col justify-center">
                        <span
                            class="text-xs text-[#f37021] font-bold uppercase tracking-wide poppins-regular"> {{ $product->category->category_name ?? 'Uncategorized' }}</span>
                        <h3 class="text-2xl font-bold magistral-medium">{{ $product->title }}</h3>
                        <p class="text-base leading-snug poppins-regular">{!! $product->description !!}</p>
                    </div>
                </div>

                <!-- Inquiry Form -->
                <form class="space-y-14 poppins-regular" x-data="{ agreed: false }">
                    <div>
                        <label class="block mb-1 text-lg font-bold text-black">
                            Full Name <span class="text-[#f37021]">*</span>
                        </label>
                        <input type="text"
                            class="w-full border-b border-gray-300 focus:border-[#f37021] outline-none py-2"
                            placeholder="Enter your full name" required>
                    </div>

                    <div>
                        <label class="block mb-1 text-lg font-bold text-black">
                            Email Address <span class="text-[#f37021]">*</span>
                        </label>
                        <input type="email"
                            class="w-full border-b border-gray-300 focus:border-[#f37021] outline-none py-2"
                            placeholder="Enter your email address" required>
                    </div>

                    <div>
                        <label class="block mb-1 text-lg font-bold text-black">
                            Phone No. <span class="text-[#f37021]">*</span>
                        </label>
                        <input type="tel"
                            class="w-full border-b border-gray-300 focus:border-[#f37021] outline-none py-2"
                            placeholder="Enter your phone number" required>
                    </div>

                    <div>
                        <label class="block mb-1 text-lg font-bold text-black">
                            Message / Inquiry Details <span class="text-sm text-[#f37021]">(optional)</span>
                        </label>
                        <textarea class="w-full border-b border-gray-300 focus:border-[#f37021] outline-none py-2 resize-none" rows="4"
                            placeholder="Enter your message">
                        </textarea>
                    </div>

                    <!-- Confirmation Checkbox -->
                    <div class="flex items-start gap-2 mt-5">
                        <input type="checkbox" id="confirm" x-model="agreed"
                            class="mt-1 w-4 h-4 text-[#f37021] border-gray-300 rounded focus:ring-[#f37021]">
                        <label for="confirm" class="text-sm leading-snug text-gray-700">
                            I confirm that the information provided is accurate and agree to be contacted by
                            <span class="font-semibold">SILID CUADRADO</span> regarding this inquiry.
                        </label>
                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center gap-4 mt-6">
                        <button type="submit"
                            class="relative z-40 flex items-center justify-center px-1 transition duration-300 cursor-pointer w-fit group">
                            <div :class="agreed ? 'bg-[#f37021]' : 'bg-gray-300 text-gray-500 cursor-not-allowed'"
                                class="relative z-10 flex items-center justify-center px-8 py-4 overflow-hidden font-medium text-black transition duration-300 w-fit group">
                                <span class="font-light text-white poppins-regular">
                                    Inquire Now
                                </span>
                                <span :class="agreed ? 'group-hover:w-[calc(100%+30px)]' : 'w-[calc(0%+0px)]'"
                                    class="absolute -z-10 inset-0 w-0 bg-black/50 skew-x-[-15deg] -left-4 transition-all duration-300 ease-in-out opacity-70"></span>
                            </div>
                            <div :class="agreed ? 'group-hover:border-r-2 group-hover:border-l-2 group-hover:border-t-2' :
                                'border-r-2 border-l-2 border-t-2 cursor-not-allowed'"
                                class="absolute w-full h-6 px-[71px] border-black border-t border-l border-r -top-1">
                            </div>
                            <div :class="agreed ? 'group-hover:border-b-2 group-hover:border-l-2 group-hover:border-r-2' :
                                'border-b-2 border-l-2 border-r-2'"
                                class="absolute w-full h-6 px-[71px] border-black border-b border-l border-r -bottom-1">
                            </div>
                            <div :class="agreed ? 'group-hover:flex' : 'flex'"
                                class="absolute bottom-0 z-20 w-[6px] h-[6px] bg-white right-1 hidden transition duration-300">
                            </div>
                        </button>

                        <button
                            class="relative z-40 flex items-center justify-center px-1 transition duration-300 cursor-pointer w-fit group"
                            type="button" @click="open = false">
                            <div
                                class="relative z-10 flex items-center justify-center px-8 py-4 overflow-hidden font-medium text-black transition duration-300 bg-gray-400 w-fit group">
                                <span class="font-light text-white poppins-regular">
                                    Cancel
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
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
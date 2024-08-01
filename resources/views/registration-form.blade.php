<x-auth-layout title="Registration ANT Horizon 2024">
    <div class="mb-10">
        <h1 class="text-4xl font-bold">Registration <br> ANT Horizon 2024</h1>
    </div>
    <div x-data="registrationForm()" x-cloak>
        <div x-show="alert.show" :class="alert.type" class="border px-4 py-3 rounded relative mb-4" role="alert">
            <span x-text="alert.message" class="block sm:inline"></span>
        </div>
        <form @submit.prevent="submitForm" class="w-full max-w-lg">
            @csrf
            <!-- Full Name -->
            <div class="w-full px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="full-name">
                    Full Name
                </label>
                <input
                    class="form-input w-full py-2"
                    :class="{'border-red-500': errors.fullName}"
                    id="full-name"
                    name="fullName"
                    type="text"
                    placeholder="Full Name"
                    x-model="form.fullName">
                <p x-show="errors.fullName" x-text="errors.fullName" class="text-red-500 text-xs italic"></p>
            </div>

            <!-- Email -->
            <div class="w-full px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                    Email Address
                </label>
                <input
                    class="form-input w-full py-2"
                    :class="{'border-red-500': errors.email}"
                    id="email"
                    name="email"
                    type="email"
                    placeholder="Email"
                    x-model="form.email">
                <p x-show="errors.email" x-text="errors.email" class="text-red-500 text-xs italic"></p>
            </div>

            <!-- Phone Number -->
            <div class="w-full px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="phone-number">
                    Phone Number
                </label>
                <input
                    class="form-input w-full py-2"
                    :class="{'border-red-500': errors.phoneNumber}"
                    id="phone-number"
                    name="phoneNumber"
                    type="tel"
                    placeholder="Phone Number"
                    x-model="form.phoneNumber">
                <p x-show="errors.phoneNumber" x-text="errors.phoneNumber" class="text-red-500 text-xs italic"></p>
            </div>

            <!-- Gender -->
            <div class="w-full px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="gender">
                    Gender
                </label>
                <select
                    class="form-input w-full py-2"
                    :class="{'border-red-500': errors.gender}"
                    id="gender"
                    name="gender"
                    x-model="form.gender">
                    <option value="">Select Gender</option>
                    @foreach($genders as $value => $label)
                        <option value="{{$value}}">{{ $label }}</option>
                    @endforeach
                </select>
                <p x-show="errors.gender" x-text="errors.gender" class="text-red-500 text-xs italic"></p>
            </div>

            <!-- Address -->
            <div class="w-full px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="address">
                    Address
                </label>
                <input
                    class="form-input w-full py-2"
                    :class="{'border-red-500': errors.address}"
                    id="address"
                    name="address"
                    type="text"
                    placeholder="Address"
                    x-model="form.address">
                <p x-show="errors.address" x-text="errors.address" class="text-red-500 text-xs italic"></p>
            </div>

            <!-- Situation -->
            <div class="w-full px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="situation">
                    Situation
                </label>
                <select
                    class="form-input w-full py-2"
                    :class="{'border-red-500': errors.situation}"
                    id="situation"
                    name="situation"
                    x-model="form.situation">
                    <option value="">Select</option>
                    @foreach($situations as $value => $label)
                        <option value="{{$value}}">{{ $label }}</option>
                    @endforeach
                </select>
                <p x-show="errors.situation" x-text="errors.situation" class="text-red-500 text-xs italic"></p>
            </div>

            <!-- ANT Membership -->
            <div class="w-full px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Are you a member of ANT?
                </label>
                <div class="flex items-center">
                    <input
                        class="mr-2 leading-tight"
                        type="radio"
                        name="isMember"
                        value="yes"
                        x-model="form.isMember">
                    <span class="text-gray-700">Yes</span>
                </div>
                <div class="flex items-center">
                    <input
                        class="mr-2 leading-tight"
                        type="radio"
                        name="isMember"
                        value="no"
                        x-model="form.isMember">
                    <span class="text-gray-700">No</span>
                </div>
                <p x-show="errors.isMember" x-text="errors.isMember" class="text-red-500 text-xs italic"></p>
            </div>

            <!-- Agreement -->
            <div class="w-full px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    I have read the internal regulations carefully and accept all the terms listed.
                </label>
                <div class="flex items-center">
                    <input
                        class="mr-2 leading-tight"
                        type="radio"
                        name="agreement"
                        value="yes"
                        x-model="form.agreement">
                    <span class="text-gray-700">Yes</span>
                </div>
                <div class="flex items-center">
                    <input
                        class="mr-2 leading-tight"
                        type="radio"
                        name="agreement"
                        value="no"
                        x-model="form.agreement">
                    <span class="text-gray-700">No</span>
                </div>
                <p x-show="errors.agreement" x-text="errors.agreement" class="text-red-500 text-xs italic"></p>
            </div>

            <!-- Submit Button -->
            <div class="w-full px-3 mb-6">
                <button
                    class="btn w-full bg-gradient-to-t from-primary to-cyan-400 bg-[length:100%_100%] bg-[bottom] text-white shadow hover:bg-[length:100%_150%]"
                    type="submit"
                    :disabled="isSubmitting"
                    x-text="isSubmitting ? 'Submitting...' : 'Register'">
                </button>
            </div>
        </form>
    </div>

    @push('scripts')
        <script>
            function registrationForm() {
                return {
                    form: {
                        fullName: '',
                        email: '',
                        phoneNumber: '',
                        gender: '',
                        address: '',
                        situation: '',
                        isMember: '',
                        agreement: ''
                    },
                    errors: {},
                    isSubmitting: false,
                    alert: {
                        show: false,
                        message: '',
                        type: ''
                    },
                    submitForm() {
                        this.isSubmitting = true;
                        this.errors = {};
                        this.alert.show = false;

                        Axios.post('{{ route('handleEventRegister') }}', this.form)
                            .then(response => {
                                this.alert = {
                                    show: true,
                                    message: response.data.message,
                                    type: 'bg-green-100 border-green-400 text-green-700'
                                };
                                setTimeout(() => {
                                    window.location.href = response.data.redirect;
                                }, 2000);
                            })
                            .catch(error => {
                                if (error.response && error.response.status === 422) {
                                    this.errors = error.response.data.errors;
                                    this.alert = {
                                        show: true,
                                        message: 'Please correct the errors in the form.',
                                        type: 'bg-red-100 border-red-400 text-red-700'
                                    };
                                } else {
                                    this.alert = {
                                        show: true,
                                        message: 'An error occurred. Please try again later.',
                                        type: 'bg-red-100 border-red-400 text-red-700'
                                    };
                                }
                            })
                            .finally(() => {
                                this.isSubmitting = false;
                            });
                    }
                }
            }
        </script>
    @endpush
</x-auth-layout>

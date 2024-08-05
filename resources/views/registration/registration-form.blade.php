<x-auth-layout title="Registration ANT Horizon 2024">
    <div class="mb-10">
        <h1 class="text-4xl font-bold">Registration <br> ANT Horizon 2024</h1>
    </div>
    <div x-data="registrationForm()" x-cloak>
        <div x-show="alert.show" :class="alert.type" class="border px-4 py-3 rounded relative mb-4" role="alert">
            <span x-text="alert.message" class="block sm:inline"></span>
        </div>
        <div class="mb-4">
            <!-- Stepper -->
            <ul class="relative flex flex-col md:flex-row gap-2">
                <!-- Iterate over steps -->
                <template x-for="(step, index) in steps" :key="index">
                    <li class="md:shrink md:basis-0 flex-1 group flex gap-x-2 md:block">
                        <div class="min-w-7 min-h-7 flex flex-col items-center md:w-full md:inline-flex md:flex-wrap md:flex-row text-xs align-middle">
                    <span :class="{'bg-primary text-white': currentStep === step.number, 'bg-gray-100 text-gray-800': currentStep !== step.number}"
                          class="size-7 flex justify-center items-center shrink-0 font-medium rounded-full dark:bg-neutral-700 dark:text-white" x-text="step.number">
                    </span>
                            <div class="mt-2 w-px h-full md:mt-0 md:ms-2 md:w-full md:h-px md:flex-1"
                                 :class="{'bg-primary': currentStep > step.number, 'bg-gray-200': currentStep <= step.number}"
                                 class="group-last:hidden dark:bg-neutral-700"></div>
                        </div>
                        <div class="grow md:grow-0 md:mt-3 pb-5">
                            <span class="block text-sm font-medium text-gray-800 dark:text-white" x-text="step.title"></span>
                            <p class="text-sm text-gray-500 dark:text-neutral-500" x-text="step.description"></p>
                        </div>
                    </li>
                </template>
            </ul>
            <!-- End Stepper -->
        </div>
        <form @submit.prevent="submitForm" class="w-full max-w-lg">
            @csrf
            <!-- Step 1: Event Description -->
            <div x-show="currentStep === 1" class="mb-4">
                <p>ANT Horizon is a flagship initiative of the National Association of Technologies aimed at high school
                    graduates interested in careers and studies in the field of Information Technology (IT). This annual
                    event, which will be held from September 6, 2024, to September 8, 2024, at the Laplaya Hammamet
                    Hotel, offers a unique platform to explore the latest innovations and trends in the IT sector.</p>

                <h3 class="text-md font-semibold mt-4">Event Highlights:</h3>
                <ul class="list-disc ml-5">
                    <li>Conferences and workshops led by experts: Renowned professionals will share their expertise on
                        advanced technologies and IT career strategies.
                    </li>
                    <li>Soft skills workshops and activities.</li>
                    <li>Networking: Opportunities to network with professionals offering career insights.</li>
                </ul>

                <h3 class="text-md font-semibold mt-4">Objectives:</h3>
                <ul class="list-disc ml-5">
                    <li>Prepare participants for successful careers in various IT sectors.</li>
                    <li>Provide a platform to explore different academic and professional paths in IT.</li>
                    <li>Learn how to develop essential interpersonal skills.</li>
                </ul>

                <h3 class="text-md font-semibold mt-4">Registration Instructions:</h3>
                <p>To register for ANT Horizon, please carefully fill out all sections of this form. Be sure to provide
                    your personal information and any specific needs to allow us to personalize your experience during
                    the event.</p>

                <h3 class="text-md font-semibold mt-4">Accommodation Rates with Full Board:</h3>
                <p>We offer different room options for your stay during the event, with the following rates, including
                    full board (breakfast, lunch, and dinner):</p>
                <ul class="list-disc ml-5 mb-4">
                    <li>Double room: 210 DT.</li>
                    <li>Triple room: 190 DT.</li>
                    <li>Quadruple room: 180 DT.</li>
                </ul>
                <p>Register today to reserve your spot!</p>
                <a href="http://associationant.tn/public/assets/reglement.pdf" target="_blank" class="text-primary">Check the internal regulations!</a>
            </div>


            <!-- Step 2: User Information -->
            <div x-show="currentStep === 2">
                <h2 class="text-lg font-semibold mb-4">User Information</h2>
                <!-- Email -->
                <div class="w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                        Email Address*
                    </label>
                    <input
                        class="form-input w-full py-2"
                        :class="{'border-red-500': errors.email}"
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Your email address"
                        x-model="form.email">
                    <p x-show="errors.email" x-text="errors.email" class="text-red-500 text-xs italic"></p>
                </div>

                <!-- Full Name -->
                <div class="w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="full-name">
                        Full Name*
                    </label>
                    <input
                        class="form-input w-full py-2"
                        :class="{'border-red-500': errors.fullName}"
                        id="full-name"
                        name="fullName"
                        type="text"
                        placeholder="Your full name"
                        x-model="form.fullName">
                    <p x-show="errors.fullName" x-text="errors.fullName" class="text-red-500 text-xs italic"></p>
                </div>

                <!-- Phone Number -->
                <div class="w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="phone-number">
                        Phone Number*
                    </label>
                    <input
                        class="form-input w-full py-2"
                        :class="{'border-red-500': errors.phoneNumber}"
                        id="phone-number"
                        name="phoneNumber"
                        type="tel"
                        placeholder="Your phone number"
                        x-model="form.phoneNumber">
                    <p x-show="errors.phoneNumber" x-text="errors.phoneNumber" class="text-red-500 text-xs italic"></p>
                </div>

                <!-- Gender -->
                <div class="w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="gender">
                        Gender*
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

                <!-- ANT Membership -->
                <div class="w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Are you a member of ANT?*
                    </label>
                    <div class="flex items-center">
                        <input
                            class="mr-2 leading-tight"
                            type="radio"
                            name="isMember"
                            value="1"
                            x-model="form.isMember">
                        <span class="text-gray-700">Yes</span>
                    </div>
                    <div class="flex items-center">
                        <input
                            class="mr-2 leading-tight"
                            type="radio"
                            name="isMember"
                            value="0"
                            x-model="form.isMember">
                        <span class="text-gray-700">No</span>
                    </div>
                    <p x-show="errors.isMember" x-text="errors.isMember" class="text-red-500 text-xs italic"></p>
                </div>
            </div>


            <!-- Step 3: Event-specific Information -->
            <div x-show="currentStep === 3">
                <h2 class="text-lg font-semibold mb-4">Event-specific Information</h2>
                <!-- Governorate -->
                <div class="w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="governorate">
                        Could you tell us which governorate you live in?*
                    </label>
                    <select
                        class="form-input w-full py-2"
                        id="governorate"
                        name="governorate"
                        x-model="form.selectedGovernorate"
                        @change="updateDelegations()">
                        <option disabled selected value="">Select</option>
                        <template x-for="governorate in data">
                            <option :value="governorate.name" x-text="governorate.name"></option>
                        </template>
                    </select>
                    <p x-show="errors.selectedGovernorate" x-text="errors.selectedGovernorate" class="text-red-500 text-xs italic"></p>

                </div>

                <!-- Delegation Select -->
                <div class="w-full px-3 mb-6"
                     x-show="form.selectedGovernorate"
                     x-transition:enter="slide-down-enter"
                     x-transition:leave="slide-up-leave"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                >
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="delegation">
                        In which delegation do you live?*
                    </label>
                    <select
                        class="form-input w-full py-2"
                        id="delegation"
                        name="delegation"
                        x-model="form.selectedDelegation"
                        @change="updateCities()">
                        <option disabled selected value="">Select</option>
                        <template x-for="delegation in delegations">
                            <option :value="delegation.name" x-text="delegation.name"></option>
                        </template>
                    </select>
                    <p x-show="errors.selectedDelegation" x-text="errors.selectedDelegation" class="text-red-500 text-xs italic"></p>

                </div>

                <!-- City Select -->
                <div class="w-full px-3 mb-6"
                     x-show="form.selectedDelegation"
                     x-transition:enter="slide-down-enter"
                     x-transition:leave="slide-up-leave"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="city">
                        In which city do you live?*
                    </label>
                    <select
                        class="form-input w-full py-2"
                        id="city"
                        name="city"
                        x-model="form.selectedCity">
                        <option value="">Select</option>
                        <template x-for="city in cities">
                            <option :value="city" x-text="city"></option>
                        </template>
                    </select>
                    <p x-show="errors.selectedCity" x-text="errors.selectedCity" class="text-red-500 text-xs italic"></p>

                </div>

                <!-- Situation -->
                <div class="w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="situation">
                        Situation*
                    </label>
                    <select
                        class="form-input w-full py-2"
                        :class="{'border-red-500': errors.situation}"
                        id="situation"
                        name="situation"
                        x-model="form.situation">
                        <option disabled selected value="">Select</option>
                        @foreach($situations as $value => $label)
                            <option value="{{$value}}">{{ $label }}</option>
                        @endforeach
                    </select>
                    <p x-show="errors.situation" x-text="errors.situation" class="text-red-500 text-xs italic"></p>
                </div>

                <!-- School -->
                <div class="w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="school">
                        Which educational institution do you study at?
                    </label>
                    <input
                        class="form-input w-full py-2"
                        :class="{'border-red-500': errors.school}"
                        id="school"
                        name="school"
                        type="text"
                        placeholder="Your answer"
                        x-model="form.school">
                    <p x-show="errors.school" x-text="errors.school" class="text-red-500 text-xs italic"></p>
                </div>

                <!-- Study Field -->
                <div class="w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="studyField">
                        What field are you studying?
                    </label>
                    <input
                        class="form-input w-full py-2"
                        :class="{'border-red-500': errors.studyField}"
                        id="studyField"
                        name="studyField"
                        type="text"
                        placeholder="Your answer"
                        x-model="form.studyField">
                    <p x-show="errors.studyField" x-text="errors.studyField" class="text-red-500 text-xs italic"></p>
                </div>

                <!-- Study Year -->
                <div class="w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="studyYear">
                        What year of study are you currently in?
                    </label>
                    <select
                        class="form-input w-full py-2"
                        :class="{'border-red-500': errors.studyYear}"
                        id="studyYear"
                        name="studyYear"
                        x-model="form.studyYear">
                        <option disabled selected value="">Select</option>
                        <option value="1">1st Year Bachelor's</option>
                        <option value="2">2nd Year Bachelor's</option>
                        <option value="3">3rd Year Bachelor's</option>
                        <option value="4">1st Year Master's</option>
                        <option value="5">2nd Year Master's</option>
                        <option value="6">1st Year Engineering Cycle</option>
                        <option value="7">2nd Year Engineering Cycle</option>
                        <option value="8">3rd Year Engineering Cycle</option>
                    </select>
                    <p x-show="errors.studyYear" x-text="errors.studyYear" class="text-red-500 text-xs italic"></p>
                </div>

                <!-- Current Position -->
                <div class="w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="currentPosition">
                        What is your current position, if you are employed?
                    </label>
                    <input
                        class="form-input w-full py-2"
                        :class="{'border-red-500': errors.currentPosition}"
                        id="currentPosition"
                        name="currentPosition"
                        type="text"
                        placeholder="Your answer"
                        x-model="form.currentPosition">
                    <p x-show="errors.currentPosition" x-text="errors.currentPosition"
                       class="text-red-500 text-xs italic"></p>
                </div>

                <!-- Interests -->
                <div class="w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Which conferences and workshops are you interested in?*
                    </label>
                    <div class="flex flex-col">
                        <label class="inline-flex items-center mt-3">
                            <input type="checkbox" class="leading-tight h-5 w-5 text-gray-600" value="AI"
                                   x-model="form.interests">
                            <span class="ml-2 text-gray-700">AI Conference</span>
                        </label>
                        <label class="inline-flex items-center mt-3">
                            <input type="checkbox" class="leading-tight h-5 w-5 text-gray-600" value="cloud"
                                   x-model="form.interests">
                            <span class="ml-2 text-gray-700">Cloud Computing Conference</span>
                        </label>
                        <label class="inline-flex items-center mt-3">
                            <input type="checkbox" class="leading-tight h-5 w-5 text-gray-600" value="web"
                                   x-model="form.interests">
                            <span class="ml-2 text-gray-700">Web Development Conference</span>
                        </label>
                        <label class="inline-flex items-center mt-3">
                            <input type="checkbox" class="leading-tight h-5 w-5 text-gray-600" value="mobile"
                                   x-model="form.interests">
                            <span class="ml-2 text-gray-700">Mobile Development Conference</span>
                        </label>
                        <label class="inline-flex items-center mt-3">
                            <input type="checkbox" class="leading-tight h-5 w-5 text-gray-600" value="security"
                                   x-model="form.interests">
                            <span class="ml-2 text-gray-700">Cybersecurity Conference</span>
                        </label>
                        <label class="inline-flex items-center mt-3">
                            <input type="checkbox" class="leading-tight h-5 w-5 text-gray-600" value="career"
                                   x-model="form.interests">
                            <span class="ml-2 text-gray-700">Career Building Conference</span>
                        </label>
                        <label class="inline-flex items-center mt-3">
                            <input type="checkbox" class="leading-tight h-5 w-5 text-gray-600" value="time"
                                   x-model="form.interests">
                            <span class="ml-2 text-gray-700">Time Management Workshop</span>
                        </label>
                        <label class="inline-flex items-center mt-3">
                            <input type="checkbox" class="leading-tight h-5 w-5 text-gray-600" value="speaking"
                                   x-model="form.interests">
                            <span class="ml-2 text-gray-700">Public Speaking Workshop</span>
                        </label>
                    </div>
                    <p x-show="errors.interests" x-text="errors.interests" class="text-red-500 text-xs italic"></p>
                </div>

                <!-- Room Type -->
                <div class="w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        What type of room would you like to book?*
                    </label>
                    <select
                        class="form-input w-full py-2"
                        :class="{'border-red-500': errors.roomType}"
                        id="roomType"
                        name="roomType"
                        x-model="form.roomType">
                        <option disabled selected value="">Select</option>
                        <option value="2">Double Room</option>
                        <option value="3">Triple Room</option>
                        <option value="4">Quadruple Room</option>
                    </select>
                    <p x-show="errors.roomType" x-text="errors.roomType" class="text-red-500 text-xs italic"></p>
                </div>

                <!-- Motivation -->
                <div class="w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="motivation">
                        What motivated you to register for this event?*
                    </label>
                    <textarea
                        class="form-textarea w-full py-2"
                        :class="{'border-red-500': errors.motivation}"
                        id="motivation"
                        name="motivation"
                        rows="3"
                        placeholder="Your answer"
                        x-model="form.motivation"></textarea>
                    <p x-show="errors.motivation" x-text="errors.motivation" class="text-red-500 text-xs italic"></p>
                </div>

                <!-- Conference Idea -->
                <div class="w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="conferenceIdea">
                        Can you suggest an idea for a conference or workshop you'd like to see organized during this
                        event?*
                    </label>
                    <textarea
                        class="form-textarea w-full py-2"
                        :class="{'border-red-500': errors.conferenceIdea}"
                        id="conferenceIdea"
                        name="conferenceIdea"
                        rows="3"
                        placeholder="Your answer"
                        x-model="form.conferenceIdea"></textarea>
                    <p x-show="errors.conferenceIdea" x-text="errors.conferenceIdea"
                       class="text-red-500 text-xs italic"></p>
                </div>

                <!-- Transport Service -->
                <div class="w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Do you want transportation service from your place of residence to the hotel?*
                    </label>
                    <div class="flex items-center">
                        <input
                            class="mr-2 leading-tight"
                            type="radio"
                            name="needTransport"
                            value="1"
                            x-model="form.needTransport">
                        <span class="text-gray-700">Yes</span>
                    </div>
                    <div class="flex items-center mt-2">
                        <input
                            class="mr-2 leading-tight"
                            type="radio"
                            name="needTransport"
                            value="0"
                            x-model="form.needTransport">
                        <span class="text-gray-700">No</span>
                    </div>
                    <p x-show="errors.needTransport" x-text="errors.needTransport"
                       class="text-red-500 text-xs italic"></p>
                </div>

                <!-- How did you hear about the event -->
                <div class="w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        How did you hear about this event?*
                    </label>
                    <div class="flex items-center">
                        <input
                            class="mr-2 leading-tight"
                            type="checkbox"
                            name="heardFrom[]"
                            value="facebook"
                            x-model="form.heardFrom">
                        <span class="text-gray-700">Facebook</span>
                    </div>
                    <div class="flex items-center mt-2">
                        <input
                            class="mr-2 leading-tight"
                            type="checkbox"
                            name="heardFrom[]"
                            value="instagram"
                            x-model="form.heardFrom">
                        <span class="text-gray-700">Instagram</span>
                    </div>
                    <div class="flex items-center mt-2">
                        <input
                            class="mr-2 leading-tight"
                            type="checkbox"
                            name="heardFrom[]"
                            value="linkedin"
                            x-model="form.heardFrom">
                        <span class="text-gray-700">LinkedIn</span>
                    </div>
                    <p x-show="errors.heardFrom" x-text="errors.heardFrom" class="text-red-500 text-xs italic"></p>
                </div>

                <!-- Agreement -->
                <div class="w-full px-3 mb-6">
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="leading-tight" name="agreement" x-model="form.agreement">
                        <span class="ml-2">I have carefully read the internal regulations and I accept all the terms contained therein.*</span>
                    </label>
                    <p x-show="errors.agreement" x-text="errors.agreement" class="text-red-500 text-xs italic"></p>
                </div>
            </div>
            <!-- Navigation Buttons -->
            <div class="w-full px-3 mb-6 flex gap-4 justify-between">
                <button
                    x-show="currentStep > 1"
                    @click="prevStep"
                    type="button"
                    class="btn w-full bg-gray-200 text-gray-800 shadow hover:bg-gray-300">
                    Previous
                </button>
                <div class="flex-grow"></div>
                <button
                    x-show="currentStep < 3"
                    @click="nextStep"
                    type="button"
                    class="btn w-full bg-gradient-to-t from-primary to-cyan-400 bg-[length:100%_100%] bg-[bottom] text-white shadow hover:bg-[length:100%_150%]">
                    Next
                </button>
                <button
                    x-show="currentStep === 3"
                    type="submit"
                    :disabled="isSubmitting"
                    class="btn w-full bg-gradient-to-t from-primary to-cyan-400 bg-[length:100%_100%] bg-[bottom] text-white shadow hover:bg-[length:100%_150%]"
                    x-text="isSubmitting ? 'Submitting...' : 'Register'">
                </button>
            </div>
        </form>
    </div>

    @push('scripts')
        <script>
            function registrationForm() {
                return {
                    currentStep: 1,
                    data: {},
                    form: {
                        fullName: '',
                        email: '',
                        phoneNumber: '',
                        gender: '',
                        isMember: '',
                        selectedGovernorate: '',
                        selectedDelegation: '',
                        selectedCity: '',
                        situation: '',
                        school: '',
                        studyField: '',
                        studyYear: '',
                        currentPosition: '',
                        interests: [],
                        roomType: '',
                        motivation: '',
                        conferenceIdea: '',
                        needTransport: '',
                        heardFrom: [],
                        agreement: false
                    },
                    delegations: [],
                    cities: [],
                    errors: {},
                    isSubmitting: false,
                    alert: {
                        show: false,
                        message: '',
                        type: ''
                    },
                    steps: [
                        { number: 1, title: 'Step 1', description: 'Event Description' },
                        { number: 2, title: 'Step 2', description: 'User Information' },
                        { number: 3, title: 'Step 3', description: 'Event-specific Information' }
                    ],
                    init() {
                        fetch('{{ asset('json/tn-gov-data.json') }}')
                            .then(response => response.json())
                            .then(jsonData => {
                                this.data = jsonData['governorates'];
                            })
                            .catch(error => {
                                console.error('Error loading data:', error);
                            });
                    },
                    updateDelegations() {
                        if (this.form.selectedGovernorate) {
                            const governorate = this.data.find(gov => gov.name === this.form.selectedGovernorate);
                            this.delegations = governorate.delegations || [];
                            this.form.selectedDelegation = '';
                            this.form.selectedCity = '';
                            this.cities = [];
                        } else {
                            this.delegations = [];
                            this.cities = [];
                        }
                    },
                    updateCities() {
                        if (this.form.selectedDelegation) {
                            const delegation = this.delegations.find(del => del.name === this.form.selectedDelegation);
                            this.cities = delegation.cities || [];
                            this.form.selectedCity = '';
                        } else {
                            this.cities = [];
                        }
                    },
                    submitForm() {
                        this.isSubmitting = true;
                        this.errors = {};
                        this.alert.show = false;
                        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                        Axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;
                        Axios.post('{{ route('handleEventRegister') }}', this.form)
                            .then(response => {
                                this.alert = {
                                    show: true,
                                    message: response.data.message,
                                    type: 'bg-green-100 border-green-400 text-green-700'
                                };
                                Swal.fire({
                                    title: '🎉 Success!',
                                    text: response.data.message,
                                    icon: 'success',
                                    confirmButtonText: 'Got it!',
                                    confirmButtonColor: '#3085d6',
                                    background: '#f4f4f4',
                                    customClass: {
                                        title: 'swal-title',
                                        content: 'swal-content',
                                        confirmButton: 'swal-confirm-button'
                                    }
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = response.data.redirect;
                                    }
                                });

                            })
                            .catch(error => {
                                if (error.response && error.response.status === 422) {
                                    this.errors = error.response.data.errors;
                                    this.currentStep = 2;
                                    this.alert = {
                                        show: true,
                                        message: 'Please correct the errors in the form.',
                                        type: 'bg-red-100 border-red-400 text-red-700'
                                    };
                                } else {
                                    this.currentStep = 2;
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
                    },
                    scrollToTop() {
                        window.scrollTo({top: 0, behavior: 'smooth'});
                    },
                    nextStep() {
                        this.currentStep++;
                        this.scrollToTop();
                    },
                    prevStep() {
                        this.currentStep--;
                        this.scrollToTop();
                    },
                    goToStep(stepNumber) {
                        this.currentStep = stepNumber;
                    },
                }
            }
        </script>
    @endpush
</x-auth-layout>

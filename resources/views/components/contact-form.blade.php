 <!-- Page content-->
 <section class="py-5">
     <div class="container px-5">
         <!-- Contact form-->
         <div id="form-div" class="bg-light rounded-4 py-5 px-4 px-md-5">
             <div class="text-center mb-5">
                 <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i
                         class="bi bi-envelope"></i></div>
                 <h1 class="fw-bolder">Get in touch</h1>
                 <p class="lead fw-normal text-muted mb-0">Let's work together!</p>
             </div>
             <div class="row gx-5 justify-content-center">
                 <div class="col-lg-8 col-xl-6">

                     <form id="contactForm">
                         <!-- Name input-->
                         <div class="mb-3">
                             <div class="form-floating">
                                 <input class="form-control" id="name" type="text"
                                     placeholder="Enter your name..." />
                                 <label for="name">Full name</label>
                             </div>

                             {{-- Error --}}
                             <small id="nameError" class="text-danger ms-1 d-none"></small>
                         </div>
                         <!-- Email address input-->
                         <div class="mb-3">
                             <div class="form-floating ">
                                 <input class="form-control" id="email" type="email"
                                     placeholder="name@example.com" />
                                 <label for="email">Email address</label>
                             </div>

                             {{-- Error --}}
                             <small id="emailError" class="text-danger ms-1 d-none"></small>
                         </div>

                         <!-- Phone number input-->
                         <div class="mb-3">
                             <div class="form-floating">
                                 <input class="form-control" id="phone" type="tel"
                                     placeholder="(123) 456-7890" />
                                 <label for="phone">Phone number</label>
                             </div>

                             {{-- Error --}}
                             <small id="phoneError" class="text-danger ms-1 d-none"></small>
                         </div>

                         <!-- Message input-->
                         <div class="mb-3">
                             <div class="form-floating">
                                 <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..."
                                     style="height: 10rem"></textarea>
                                 <label for="message">Message</label>
                             </div>

                             {{-- Error --}}
                             <small id="messageError" class="text-danger ms-1 d-none"></small>
                         </div>


                         {{-- Submit btn --}}
                         <div class="d-grid mt-2">
                             <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Submit</button>
                         </div>
                 </div>
                 </form>
             </div>
         </div>
     </div>
     </div>
 </section>

 <script>
     // Function to get DOM elements by their ID
     const getElement = (id) => {
         return document.getElementById(id);
     }

     // Get references to form input elements
     const fullName = getElement('name');
     const email = getElement('email');
     const phoneInput = getElement('phone');
     const message = getElement('message');

     // Get references to error message elements
     const fullNameError = getElement('nameError');
     const emailError = getElement('emailError');
     const phoneError = getElement('phoneError');
     const messageError = getElement('messageError');

     // Add a submit event listener to the contact form
     getElement('contactForm').addEventListener('submit', (e) => {

         // Create a new instance of FormValidation
         const form = new FormValidation();
         e.preventDefault(); // Prevent the form from submitting

         // Check if all form fields are valid, and if so, submit the form
         if (form.checkName() && form.checkEmail() && form.checkPhone() && form.checkMessage()) {
             postForm();
         }
     });

     // Function to post form data to the server
     const postForm = async () => {
         const loadingScreen = getElement('loading-div');
         const contents = getElement('form-div');

         // Hide form contents during the request
         contents.classList.add('d-none');

         // Show loading screen while the request is being processed
         loadingScreen.classList.remove('d-none');

         try {
             const res = await axios.post('/contactRequest', {
                 fullName: fullName.value,
                 email: email.value,
                 phone: phoneInput.value,
                 message: message.value
             })
             // Reset the form after successful submission
             getElement('contactForm').reset();

             // Show the form contents again
             contents.classList.remove('d-none');

             // Hide loading screen if there was an error
             loadingScreen.classList.add('d-none');


         } catch (error) {
             // Hide loading screen if there was an error
             loadingScreen.classList.add('d-none');

             // Show the form contents again
             contents.classList.remove('d-none');

             // Show an alert to the user in case of an error
             alert('Something went wrong');

             // Log the error to the console for debugging
             console.error(error);
         }
     }

     // Class for form validation methods
     class FormValidation {
         // Check if the name field is valid
         checkName() {
             if (fullName.value === '') {
                 fullNameError.classList.remove('d-none');
                 fullNameError.innerText = 'Name is required';
                 return false;
             } else {
                 fullNameError.classList.add('d-none');
                 return true;
             }
         }

         // Check if the email field is valid
         checkEmail() {
             const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
             if (email.value === '') {
                 emailError.classList.remove('d-none');
                 emailError.innerText = 'Email is required';
                 return false;
             } else if (!emailRegex.test(email.value)) {
                 emailError.classList.remove('d-none');
                 emailError.innerText = 'Email is not valid';
                 return false;
             } else {
                 emailError.classList.add('d-none');
                 return true;
             }
         }

         // Check if the phone field is valid
         checkPhone() {
             if (phoneInput.value === '') {
                 phoneError.classList.remove('d-none');
                 phoneError.innerText = 'Phone number is required';
                 return false;
             } else {
                 phoneError.classList.add('d-none');
                 return true;
             }
         }

         // Check if the message field is valid
         checkMessage() {
             if (message.value === '') {
                 messageError.classList.remove('d-none');
                 messageError.innerText = 'Message is required';
                 return false;
             } else {
                 messageError.classList.add('d-none');
                 return true;
             }
         }
     }
 </script>

  <!-- Header-->
  <header class="py-5">
      <div class="container px-5 pb-5">
          <div id="content" class="row gx-5 align-items-center">
              <div class="col-xxl-5">
                  <!-- Header text content-->
                  <div class="text-center text-xxl-start">
                      <div id="keyLine" class="badge bg-gradient-primary-to-secondary text-white mb-4">
                          <div class="text-uppercase"></div>
                      </div>
                      <div id="shortTitle" class="fs-3 fw-light text-muted"></div>
                      <h1 id="mainTitle" class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline"></span>
                      </h1>
                      <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                          <a id="cv2link" target="_blank"
                              class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder"
                              href="{{ url('/resume') }}">Resume</a>
                          <a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder"
                              href="{{ url('/projects') }}">Projects</a>
                      </div>
                  </div>
              </div>
              <div class="col-xxl-7">
                  <div class="d-flex justify-content-center mt-5 mt-xxl-0">
                      <div class="profile">
                          <img id="profileImage" class="profile-img" src="" alt="mx-x" />
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </header>

  <script>
      const getHero = async () => {
          // Get references to HTML elements
          const loading = document.getElementById("loading-div");
          const content = document.getElementById('content');

          // Show loading spinner and hide content
          loading.classList.remove('d-none');
          content.classList.add('d-none');

          try {
              const response = await axios.get('/heroData');
              const {
                  img,
                  keyLine,
                  title,
                  shortTitle
              } = response['data'];


              // Hide loading spinner and show content
              loading.classList.add('d-none');
              content.classList.remove('d-none');

              //   Set Profile Picture
              document.getElementById('profileImage').src = img;

              //   Set keyLine
              document.getElementById('keyLine').innerText = keyLine;

              //   Set Short Title
              document.getElementById('shortTitle').innerText = shortTitle;

              //   Set Short Title
              document.getElementById('mainTitle').innerText = title;

          } catch (error) {
              alart('something went wrong');
              console.error(error);
          }
      }
      getHero()
  </script>

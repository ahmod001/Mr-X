    <!-- About Section-->
    <section class="bg-light py-5">
        <div id="mainContent" class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-xxl-8">
                    <div class="text-center my-5">
                        <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">About Me</span></h2>
                        <p id="title" class="lead fw-light mb-4"></p>
                        <p id="details" class="text-muted"></p>
                        <div class="d-flex justify-content-center fs-2 gap-4">
                            <a target="_blank" id="twitter" class="text-gradient" href=""><i
                                    class="bi bi-twitter"></i></a>
                            <a target="_blank" id="linkedin" class="text-gradient" href=""><i
                                    class="bi bi-linkedin"></i></a>
                            <a target="_blank" id="github"class="text-gradient" href=""><i
                                    class="bi bi-github"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Get references to HTML elements
        const loading = document.getElementById("loading-div");
        const content = document.getElementById('mainContent');

        const getData = async function() {
            // Show loading spinner and hide content
            loading.classList.remove('d-none');
            content.classList.add('d-none');

            try {
                const aboutData = await axios.get('/aboutData');
                const socialData = await axios.get('/socialData');

                // Hide loading spinner and show content
                loading.classList.add('d-none');
                content.classList.remove('d-none');

                DOM.updateAbout(aboutData['data']);
                DOM.updateSocialLinks(socialData['data']);
            } catch (error) {
                alart('something went wrong');
                console.error(error);
            }
        }();

        class DOM {
            static updateAbout(about) {
                //   Set title
                document.getElementById('title').innerText = about['title'];

                //   Set details
                document.getElementById('details').innerText = about['details'];
            }


            static updateSocialLinks(links) {
                const {
                    twitterLink,
                    githubLink,
                    linkedinLink
                } = links;

                //   Set Twitter
                document.getElementById('twitter').href = twitterLink;

                //   Set Github
                document.getElementById('github').href = githubLink;

                //   Set Linkedin
                document.getElementById('linkedin').href = linkedinLink;
            }
        }
    </script>

<div class="container px-5 my-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Resume</span></h1>
    </div>
    <div class="row gx-5 justify-content-center">
        <div class="col-lg-11 col-xl-9 col-xxl-8">
            <!-- Experience Section-->
            <section id="experiance-list">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h2 class="text-primary fw-bolder mb-0">Experience</h2>
                    <a class="btn btn-primary px-4 py-3" id="cvlink" href="">
                        <div class="d-inline-block bi bi-download me-2"></div>
                        Download Resume
                    </a>
                </div>

                <!-- Experience Card 1-->

            </section>
        </div>
    </div>
</div>


<script>
    downloadResume();
    async function downloadResume() {
        try {
            let response = await axios.get('/resumeLink');
            let link = response.data['downloadLink'];

            document.getElementById('cvlink').setAttribute('href', link);
        } catch (error) {
            alert('something went wrong');
            console.error(error);
        }

    }
    getExperience();
    async function getExperience() {

        //show loder
        document.getElementById('loading-div').classList.remove('d-none');
        document.getElementById('content-div').classList.add('d-none');
        try {
            const response = await axios.get('/experiencesData');

            //Hide loder
            document.getElementById('loading-div').classList.add('d-none');
            document.getElementById('content-div').classList.remove('d-none');

            response.data.forEach(item => {
                document.getElementById('experiance-list').innerHTML += (

                    `<div class="card shadow border-0 rounded-4 mb-5">
                    <div class="card-body p-5">
                        <div class="row align-items-center gx-5">
                            <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                <div class="bg-light p-4 rounded-4">
                                    <div class="text-primary fw-bolder mb-2">${item['duration']}</div>
                                    <div class="small fw-bolder">${item['title']}</div>
                                    <div class="small text-muted">${item['designation']}</div>
                                </div>
                            </div>
                            <div class="col-lg-8">${item['details']}</div></div>
                        </div>
                    </div>
                </div>`
                )

            });

        } catch (error) {
            alert('something went wrong');
            console.error(error);
        }
    }
</script>

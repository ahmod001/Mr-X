<div class="container px-5 my-5">
    <div class="text-center mb-5">

    </div>
    <div class="row gx-5 justify-content-center">
        <div class="col-lg-11 col-xl-9 col-xxl-8">
            <section>
                <!-- Skillset Card-->
                <div class="card shadow border-0 rounded-4 mb-5">
                    <div class="card-body p-5">
                        <!-- Professional skills list-->
                        <div class="mb-5">
                            <div class="d-flex align-items-center mb-4">
                                <div
                                    class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 me-3">
                                    <i class="bi bi-tools"></i>
                                </div>
                                <h3 class="fw-bolder mb-0"><span class="text-gradient d-inline">Professional
                                        Skills</span></h3>
                            </div>
                            <div id="skill-list" class="row row-cols-1 row-cols-md-3 mb-4">


                            </div>

                        </div>

                    </div>
                </div>
            </section>

        </div>
    </div>
</div>


<script>
    SkillsList();

    async function SkillsList() {



        try {


            let respons = await axios('/skillsData');

            respons.data.forEach(item => {
                document.getElementById('skill-list').innerHTML += (
                    `
              <div class="col mb-4 mb-md-0 p-2">
             <div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">${item['name']}</div>
                </div>
             `)


            });

        } catch (error) {
            alart('something went wrong')
            console.error(error);
        }


    }
</script>

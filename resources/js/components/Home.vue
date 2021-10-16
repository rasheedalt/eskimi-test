<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Campaign List
                    <router-link :to="{name: 'add'}" class="btn btn-success float-right">Add Campaign</router-link>
                    </div>

                    <div class="card-body">
                       <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Total Budget</th>
                                <th>Daily Budget</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="campaign in campaigns" :key="campaign.id">
                                <td>{{ campaign.id }}</td>
                                <td>{{ campaign.name }}</td>
                                <td>{{ campaign.total_budget }}</td>
                                <td>{{ campaign.daily_budget }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <router-link :to="{name: 'edit', params: { id: campaign.id }}" class="btn btn-success">Edit</router-link>
                                        <button v-if="campaign.banners.length > 0" class="btn btn-primary" @click="viewBanners(campaign.banners)">View Banner</button>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal" :class="{'d-block': showModal}" ref="modal" tabindex="-1" role="dialog" id="bannerModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title">Modal title</h5> -->
                        <button @click="hideModal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="banner-container">
                        <p>Modal body text goes here.</p>
                    </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                campaigns: [],
                showModal: false,
            }
        },
        created() {
            this.axios
                .get('http://localhost/api/campaigns/')
                .then(response => {
                    this.campaigns = response.data.data;
                    // console.log(response.data)
                    console.log(this.showModal)
                });
        },
        methods: {
            viewBanners(banners){
                console.log(banners);
                let container = document.getElementById('banner-container');
                container.innerHTML = ''
                let images = '';
                banners.forEach(element => {
                    images+=`<img src="http://localhost${element.path}/${element.name}" height="100px" />`
                });
                container.innerHTML = images
                this.showModal = true;
                // alert(banners)
            },
            hideModal(){
                this.showModal = false
                console.log(this.showModal)
            }
        }
    }
</script>

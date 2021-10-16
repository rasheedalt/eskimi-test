<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Campaign
                            <router-link :to="{name: 'home'}" class="btn btn-danger float-right">Back to List</router-link>
                    </div>

                    <div class="card-body">
                        <div v-if="success != ''" class="alert alert-success"> {{success}} </div>

                        <form @submit.prevent="submit">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" v-model="fields.name"  />
                                <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>

                            </div>
                            <div class="form-group">
                                <label for="">Date from</label>
                                <input type="date" class="form-control" name="date_from" v-model="fields.date_from"  />
                                <div v-if="errors && errors.date_from" class="text-danger">{{ errors.date_from[0] }}</div>

                            </div>
                            <div class="form-group">
                                <label for="">Date To</label>
                                <input type="date" class="form-control" name="date_to" v-model="fields.date_to"  />
                                <div v-if="errors && errors.date_to" class="text-danger">{{ errors.date_to[0] }}</div>

                            </div>
                            <div class="form-group">
                                <label for="">Total Budget (USD)</label>
                                <input type="text" class="form-control" name="total_budget" v-model="fields.total_budget" />
                                <div v-if="errors && errors.total_budget" class="text-danger">{{ errors.total_budget[0] }}</div>
                            </div>
                            <div class="form-group">
                                <label for="">Daily Budget (USD)</label>
                                <input type="text" class="form-control" name="daily_budget" v-model="fields.daily_budget" />
                                <div v-if="errors && errors.daily_budget" class="text-danger">{{ errors.daily_budget[0] }}</div>
                            </div>
                            <div class="form-group">
                                <label for="">Banner</label>
                                <input type="file" multiple class="form-control" name="files" v-on:change="uploadFile" accept=".jpg, .jpeg, .png" />
                                <div v-if="errors && errors.files" class="text-danger">{{ errors.files[0] }}</div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-block btn-success">Create</button>
                            </div>
                        </form>
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
            fields: {},
            errors: {},
            files: [],
            banners: [],
            success: '',
            }
        },
        methods: {
            uploadFile(e){
                let selectedFiles = e.target.files;

                if(!selectedFiles.length){
                    return false;
                }
                for(let i=0; i < selectedFiles.length; i++){
                    this.files.push(selectedFiles[i])
                }
            },
            submit() {
                this.errors = {};

                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                };

                let formData = new FormData();

                for(let i=0; i < this.files.length; i++){
                    formData.append('files[]', this.files[i]);
                }

                formData.append('name', this.fields.name);
                formData.append('date_from', this.fields.date_from);
                formData.append('date_to', this.fields.date_to);
                formData.append('total_budget', this.fields.total_budget);
                formData.append('daily_budget', this.fields.daily_budget);

                // console.log(formData)
                axios.post('http://localhost/api/campaigns', formData, config).then(response => {
                    this.success = 'Created successfully'

                    setTimeout(()=>{
                        this.$router.push({ name: 'home' })
                    }, 2000)
                }).catch(error => {
                    alert(error)
                    if (error.response.status === 422) {
                    this.errors = error.response.data.errors || {};
                    }
                });
            },
        }
    }
</script>

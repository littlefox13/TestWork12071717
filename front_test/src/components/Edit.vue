<template>
    <div>
        <h3 class="text-center">Edit Product {{ product.id }}</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateProduct">

                    <div class="form-group">
                        <label>name</label>
                        <input type="text" class="form-control" v-model="product.name">
                    </div>

                    <div class="form-group">
                        <label>detail</label>
                        <input type="text" class="form-control" v-model="product.detail">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import DataService from "../services/DataService";
    export default {
        data() {
            return {
                product: {}
            }
        },
        created() {

            DataService.get(this.$route.params.id).then(resp => {
                this.product = resp.data;
            });

        },
        methods: {
            updateProduct() {
                var data = {
                    name: this.product.name,
                    detail: this.product.detail
                };
                DataService.update(this.product.id, data).then(resp => {
                   console.log(resp.data);
                   alert(resp.data);
                   this.$router.push({ name: "products" });
                });
                console.log(this.product);
            }
        }
    }
</script>
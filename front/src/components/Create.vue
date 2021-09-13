<template>
    <div className="container">
        <div className="card">
            <div className="card-header">
                <h3>Add Item</h3>
            </div>
            <div className="card-body">
                <form v-on:submit.prevent="addItem">
                    <div className="form-group">
                        <label>Item Name:</label>
                        <input type="text" className="form-control" v-model="item.name"/>
                    </div>
                    <div className="form-group">
                        <label>Item Price:</label>
                        <input type="text" className="form-control" v-model="item.price"/>
                    </div>
                    <div className="form-group">
                        <input type="submit" className="btn btn-primary" value="Add Item"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        components: {
            /*name: 'AddItem'*/
        },
        data() {
            return {
                item: {}
            }
        },
        methods: {
            addItem() {
                let uri = 'http://localhost:4000/api/create';
                this.axios.post(uri, this.item).then((response) => {
                    console.log(response.data)
                });
            }
        }
    }
</script>
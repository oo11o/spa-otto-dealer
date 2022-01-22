<template>
    <div>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading" v-if="customer.name1">Здравствуйте, {{ customer.name1.toUpperCase() }}!</h4>
            <p>Ваш email: {{ customer.email }}</p>
            <hr>
            <p class="mb-0">Заказы на Отто Украина формируются и упаковываются в Германии! </p>
        </div>

        <table v-for="item in orders" class="table order">
            <thead class="table-dark table-bordered">
            <tr>
                <td>Дата заказа</td>
                <td>Каталог</td>
                <td>Название Товара</td>
                <td>Размер</td>
                <td>Артикул</td>
                <td>Цена в каталоге</td>
                <td>Цена</td>
                <td>Статус</td>
                <!--                    <td>Дата отправки</td>-->
                <!--                    <td>Дата возврата</td>-->
            </tr>
            </thead>
            <tbody>
            <tr v-for="order in item.orders">
                <td>{{ (order.doc_date).split(' ')[0] }}</td>
                <td>{{ order.catalog }}</td>
                <td>{{ order.title }}</td>
                <td>{{ order.size }}</td>
                <td>{{ order.catalog }}</td>
                <td>{{ order.price_catalog }}</td>
                <td>{{ order.price }}</td>
                <td>{{ checkStatus(order.status) }}</td>
                <!--                <td>{{order.catalog}}</td>-->
                <!--                <td>{{order.catalog}}</td>-->
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "App",
    data() {
        return {
            customer: '',
            status: '',
            orders: []
        }
    },

    methods: {
        getResult() {
            axios('/api/customers/7329')
                .then(response => {
                    this.customer = response.data.data;
                    this.getOrders(response.data.data.orders);
                })
        },

        getStatus() {
            axios('/api/status')
                .then(response => {
                    this.status = response.data.data;
                    console.log(this.status)
                })
        },

        getOrders(orders) {
            for (let i = 0; i < orders.length; i++) {

                // idElementOrder - ID this.orders. Вернет или false или номер ячейки,
                // где был найден заказ

                let idElementOrder = this.hasIdOrder(orders[i].order_id);

                if (idElementOrder) {
                    this.orders[idElementOrder].orders.push(orders[i])
                } else {
                    this.orders.push(
                        {
                            'name': orders[i].order_id,
                            'orders': [orders[i]],
                        })

                }
            }
        },

        checkStatus(idStatus) {
            for (let i = 0; i < this.status.length; i++) {
                if (this.status[i].id === idStatus) {
                    return this.status[i].title;
                }
            }
        },

        hasIdOrder(idOrder) {
            for (let i = 0; i < this.orders.length; i++) {
                if (this.orders[i].name === idOrder) {
                    return i;
                }
            }
            return false;
        }
    },
    mounted() {
        this.getResult(),
            this.getStatus()
    }
}
</script>

<style scoped>

</style>

<!-- /resources/assets/js/components/Leaderboard.vue -->
<template>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Rank</th>
                <th>Name</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            <tr :class="{success: user.id == current}" v-for="(user, key) in sortedUsers">
                <td>{{ ++key }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.score }}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        props: ['current'],
        data() {
            return {
                users: []
            }
        },
        created() {
            this.fetchLeaderboard();
            this.listenForChanges();
        },
        methods: {
            fetchLeaderboard() {
                axios.get('/leaderboard').then((response) => {
                    this.users = response.data;
                })
            },
            listenForChanges() {
                Echo.channel('leaderboard')
                .listen('ScoreUpdated', (e) => {
                    var user = this.users.find((user) => user.id === e.id);
                        // check if user exists on leaderboard
                        if(user){
                            var index = this.users.indexOf(user);
                            this.users[index].score = e.score;
                        }
                        // if not, add 'em
                        else {
                            this.users.push(e)
                        }
                    })
            }
        },
        computed: {
            sortedUsers() {
                return this.users.sort((a,b) => b.score - a.score)
            }
        }
    }
</script>
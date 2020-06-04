<template>
    <div class="ol1 px-4" >
        <a :href="'/user/' + item.username" >
            <img v-bind:src="'/' + item.avatar" class="rounded-full mr-auto" style="width: 50px; height: 50px"   />
            <div class="mr-auto" style="text-align: center" > <span class="font-bold fs13 text-gray-600">{{item.subname}}</span></div>
        </a>
            <div class="flex">
                <div class="mt-1 mr-auto px-2 bg-gray-500 rounded" style="padding-top: 1px;padding-bottom: 2px" v-if="item.is_me > 0">
                    <a href="/user-edit"><span class="text-white">Edit my profile</span></a>
                </div>
                <div class="mt-1 mr-auto px-2 bg-gray-500 text-white rounded un-follow-this" :user-id="item.user_follow_id" :is-follow="item.is_follow" style="padding-top: 1px;padding-bottom: 2px; cursor:pointer"  v-if="item.showFollow == true && item.is_me <= 0">
                    <span v-if="item.is_follow == true" >Unfollow</span>
                    <span v-else >Follow</span>
                </div>
            </div>

    </div>
</template>
<script>
import ConfessionOptionModal from './ConfessionOptionModal'
import ConfessionDetailModal from './ConfessionDetailModal'
import LoginAlertModel from './LoginAlertModel'
export default {
    props: ['item', 'showFollow'],

    methods: {
        likeConfession(confession) {
            if (window.user == undefined) {
                this.showLoginAlertModel()
                return
            }
            this.toggleLikeCount(confession);
            axios.post('/like-confession', {
                    id: confession.id
                })
                .then(({ data }) => {
                    if (data.success.attached != '') {
                        confession.is_liked = true;
                    } else {
                        confession.is_liked = false;
                    }
                })
                .catch(() => {
                    //
                })
        },

        toggleLikeCount(confession) {
            if (confession.is_liked) {
                confession.like_count--;
                confession.is_liked = false;
            } else {
                confession.like_count++;
                confession.is_liked = true;
            }
        },

        followUser(confession) {
            if (window.user == undefined) {
                this.showLoginAlertModel()
                return
            }
            if (confession.user.is_following) {
                confession.user.is_following = false;
            } else {
                confession.user.is_following = true;
            }
            axios.post('/follow-user', {
                    id: confession.user.id
                })
                .then(() => {
                    const activeMenu = this.$store.state.activeMenu
                    if (activeMenu == 'trending') {
                        this.$store.dispatch('getTrendingConfessions')
                    } else if (activeMenu == 'latest') {
                        this.$store.dispatch('getLatestConfessions')
                    } else {
                        this.$store.dispatch('getFollowingPeopleConfessions')
                    }
                    Fire.$emit('updated')
                })
        },

        showOptions(id, userId) {
            if (window.user == undefined) {
                this.showLoginAlertModel()
                return
            }
            this.$modal.show(ConfessionOptionModal, {
                id: id,
                userId: userId,
                page: 'index',
            }, {
                width: 250,
                height: 'auto'
            })
        },

        showLoginAlertModel() {
            this.$modal.show(LoginAlertModel, {
                width: 250,
                height: 'auto'
            })
        },

        showCategory(){
            if (window.user == undefined) {
                this.showLoginAlertModel()
                return
            }
            var href="`/category/${confession.category.slug}`";
            router.push({ path: href })
        },

        showConfessionDetailModal(confession) {
            if (window.user == undefined) {
                this.showLoginAlertModel()
                return
            }
            history.pushState({ foo: "bar" }, "page 2", `/confessions/${confession.id}`);
            this.$modal.show(ConfessionDetailModal, {
                confession: confession,
            }, {
                width: '80%',
                height: 'auto',
                scrollable: true
            })
        },

        isAuthenticated() {
            if (window.user == undefined) {
                this.showLoginAlertModel()
                return
            }
        }
    },

    created() {
        Fire.$on('FollowUser', (confession) => {
            alert('ok')
            this.followUser(confession)
        })
    }
}

</script>
<style>
</style>

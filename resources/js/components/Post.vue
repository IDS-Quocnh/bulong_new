<template>
    <div class="post-holder" :id="'post-holder-' + item.id">
        <div class="mt-6 mb-8 bg-white border rounded-lg shadow">
            <div class="flex justify-between p-4">
                <div class="flex">
                    <div><a :href="'/user/' + item.username"><img
                        :src="'/'+item.avatar"
                        class="h-10 w-10 mr-2 rounded-full"></a></div>
                    <div v-if="item.loginId == item.user_id">
                        <div style="text-align: center" class="mt-2"><a :href="'/user/' + item.username"
                                                           class="text-teal-600 font-bold mr-1 text-green-1">{{ item.username }}</a></div>
                    </div>

                    <div v-if="item.loginId != item.user_id">
                        <div style="text-align: center"><a :href="'/user/' + item.username"
                                                           class="text-teal-600 font-bold mr-1 text-green-1">{{ item.username }}</a></div>
                        <div>
                            <button class="px-6 follow-wrapper no-glow text-sm text-white bg-yellow-600 rounded" is-follow="1" :id="'button-follow-' + item.id" :user-id="item.user_id" v-if="item.is_follow > 0">
                                Unfollow
                            </button>

                            <button class="px-6 follow-wrapper no-glow text-sm text-white bg-yellow-600 rounded" is-follow="0" :id="'button-follow-' + item.id"  :user-id="item.user_id" v-if="item.is_follow == 0">
                                Follow
                            </button>
                        </div>
                    </div>


                </div>
                <div>
                    <div class="cursor-pointer"><i class="fa fa-ellipsis-h text-gray-600 threeDotSelect" :bg-image="item.background_image"  :text="item.text" :confession-id="item.id" :confession-user-id="item.user_id" :is-follow="item.is_follow" data-toggle="modal" data-target="#exampleModal"></i>
                    </div>
                </div>
            </div>
            <div :id="'bg-' + item.id"
                class="h-135 w-full -z-10 flex justify-center items-center bg-cover bg-center"
                :style="{'background-image': `url(${item.background_image})`}" >
                <p class="px-4 text-xl font-extrabold" style="font-family: HelveticaNeue;" :id="'text-' + item.id">
                    {{ item.text.substring(0, 600) }}
                </p>
            </div>
            <div class="mt-2 text-sm ml-4 lg:flex lg:justify-end"><span class="mr-2 text-gray-600">Posted {{ item.ago}} on </span>
                <a :href="'/category/' + item.slug"
                   class="mr-4 text-teal-600 font-bold" :id="'category-' + item.id" >{{ item.categories_name}}</a>
            </div>
            <div class="ml-4 pb-2 flex">
                <div class="flex flex-col items-center cursor-pointer like-button" v-bind:post-id ="item.id" v-bind:is-like="item.is_like" ><span class="like_count">{{ item.like_count }}</span>
                    <img src="/public/allimage/feel.png" class="w-6 h-6" is-like="0" v-if="item.is_like == 0">
                    <img src="/public/allimage/felt.png" class="w-6 h-6" is-like="1" v-if="item.is_like > 0">
                </div>
                <div class="mx-4 flex flex-col items-center cursor-pointer comment-button" :confession-id="item.id" v-bind:post-id ="item.id"><span>{{ item.comment_count }}</span> <img
                    src="/public/allimage/comment.png" class="w-6 h-6"></div>
                <div class="flex flex-col justify-end cursor-pointer share-button"  v-bind:post-id ="item.id"><img
                    src="/public/allimage/share.png" class="w-6 h-6" data-toggle="modal" data-target="#shareModal" ></div>
            </div>
        </div>
    </div>
</template>
<script>
import ConfessionOptionModal from './ConfessionOptionModal'
import ConfessionDetailModal from './ConfessionDetailModal'
import LoginAlertModel from './LoginAlertModel'
export default {
    props: ['item', 'confession_height', 'loginId'],

    methods: {
        likeConfession(confession) {
            if (window.user == undefined) {
                this.showLoginAlertModel()
                return
            }
            this.toggleLikeCount(confession);
            axios.post('/like-confession', {
                    id: item.id
                })
                .then(({ data }) => {
                    if (data.success.attached != '') {
                        item.is_liked = true;
                    } else {
                        item.is_liked = false;
                    }
                })
                .catch(() => {
                    //
                })
        },

        toggleLikeCount(confession) {
            if (item.is_liked) {
                item.like_count--;
                item.is_liked = false;
            } else {
                item.like_count++;
                item.is_liked = true;
            }
        },

        followUser(confession) {
            if (window.user == undefined) {
                this.showLoginAlertModel()
                return
            }
            if (item.user.is_following) {
                item.user.is_following = false;
            } else {
                item.user.is_following = true;
            }
            axios.post('/follow-user', {
                    id: item.user.id
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
            var href="`/category/${item.category.slug}`";
            router.push({ path: href })
        },

        showConfessionDetailModal(confession) {
            if (window.user == undefined) {
                this.showLoginAlertModel()
                return
            }
            history.pushState({ foo: "bar" }, "page 2", `/confessions/${item.id}`);
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

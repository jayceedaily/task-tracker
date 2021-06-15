<template>

    <nav class="navbar is-primary">
        <div class="container">

            <div class="navbar-menu">
                <template  v-for="(menu, index) in menus">

                    <router-link
                        v-if="!menu.menus"
                        :key="index"
                        class="navbar-item"
                        :to="menu.to">{{__(menu.label)}}
                    </router-link>

                    <div v-else :key="index"  class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            {{__(menu.label)}}
                        </a>
                        <div  class="navbar-dropdown" >
                            <router-link
                                v-for="(menu, xxx) in menu.menus" :key="xxx"
                                class="navbar-item"
                                :to="menu.to">{{__(menu.label)}}
                            </router-link>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: 'TopNav',
    data() {
        return {
            menus: [
                {
                    label: 'tasks.task',
                    to: 'task'
                },
                {
                    label: 'project',
                    to: 'project'
                },
                {
                    label: 'logs',
                    to: 'logs'
                },
                {
                    label: 'users.users',
                    to: 'users',
                    menus: [
                        {
                            label: 'task',
                            to: 'task'
                        },
                        {
                            label: 'project',
                            to: 'project'
                        },
                        {
                            label: 'logs',
                            to: 'logs'
                        },
                        {
                            label: 'users.users',
                            to: 'users'
                        },
                    ]
                }
            ]
        }
    },
}
</script>

<style>

</style>

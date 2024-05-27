<template>
    <div class="min-h-screen bg-gray-100 flex">
        <!-- Sidebar -->
        <nav class="bg-white w-64 border-r border-gray-100 flex-shrink-0">
            <div class="flex flex-col h-full">
                <!-- Logo -->
                <div class="shrink-0 flex items-center justify-center h-16 border-b border-gray-100">
                    <Link :href="route('dashboard')">
                        <ApplicationLogo class="block h-9 w-auto fill-current text-gray-800" />
                    </Link>
                </div>

                <!-- User Dropdown -->
                <div class="border-b border-gray-100 p-4">
                    <Dropdown align="right" width="48">
                        <template #trigger>
                            <span class="inline-flex rounded-md">
                                <button
                                    type="button"
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                >
                                    {{ $page.props.auth.user.name }}
                                    <svg
                                        class="ms-2 -me-0.5 h-4 w-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </button>
                            </span>
                        </template>

                        <template #content>
                            <DropdownLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </DropdownLink>
                        </template>
                    </Dropdown>
                </div>

                <!-- Navigation Links -->
                <div class="space-y-1 px-4">
                    <NavLink :href="'/dashboard'" :active="$page.component == 'Dashboard'">
                        Dashboard
                    </NavLink>
                    <NavLink :href="'/players'" :active="$page.component == 'Players'">
                        Thrifty
                    </NavLink>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="flex-1">
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <main>
                <slot />
            </main>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<style scoped>
/* Styles for navigation links */
.nav-link {
    display: block;
    padding: 0.75rem 1rem;
    color: #4a5568;
    text-decoration: none;
    transition: background-color 0.2s;
}

.nav-link:hover,
.nav-link.active {
    background-color: #edf2f7;
    color: #2d3748;
    border-left: 2px solid #4299e1; /* Highlighted border on hover/active */
}

/* Styles for active navigation link */
.nav-link.active {
    font-weight: 600;
}

/* Styles for user dropdown */
.user-dropdown {
    border-top: 1px solid #e2e8f0;
    margin-top: auto; /* Push the dropdown to the bottom of the sidebar */
}

/* Styles for dropdown trigger */
.dropdown-trigger {
    cursor: pointer;
}

/* Styles for dropdown content */
.dropdown-content {
    position: absolute;
    right: 0;
    top: calc(100% + 0.5rem);
    z-index: 10;
    min-width: 12rem;
    background-color: #fff;
    border: 1px solid #cbd5e0;
    border-radius: 0.375rem;
    box-shadow: 0 2px 0 rgba(0, 0, 0, 0.05);
}

.dropdown-item {
    display: block;
    padding: 0.5rem 1rem;
    color: #4a5568;
    font-size: 0.875rem;
    text-decoration: none;
    transition: background-color 0.2s;
}

.dropdown-item:hover {
    background-color: #edf2f7;
}

/* Styles for dropdown arrow */
.dropdown-arrow {
    position: absolute;
    top: -0.5rem;
    right: 1rem;
    width: 0;
    height: 0;
    border-width: 0.5rem;
    border-style: solid;
    border-color: transparent transparent #fff transparent;
}

/* Styles for dropdown arrow when dropdown is open */
.dropdown-open .dropdown-arrow {
    border-color: #cbd5e0 transparent transparent transparent;
    top: 1rem;
}
</style>

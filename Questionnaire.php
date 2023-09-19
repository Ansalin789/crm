<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" type="image/x-icon" href="assets/images/favicon.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com/" />
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" media="screen" href="assets/css/perfect-scrollbar.min.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="assets/css/style.css" />
        <link defer rel="stylesheet" type="text/css" media="screen" href="assets/css/animate.css" />
        <script src="assets/js/perfect-scrollbar.min.js"></script>
        <script defer src="assets/js/popper.min.js"></script>
        <script defer src="assets/js/tippy-bundle.umd.min.js"></script>
        <script defer src="assets/js/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>

    <body
        x-data="main"
        class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased"
        :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ?  'dark' : '', $store.app.menu, $store.app.layout,$store.app.rtlClass]"
    >
        <!-- sidebar menu overlay -->
        <div x-cloak class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{'hidden' : !$store.app.sidebar}" @click="$store.app.toggleSidebar()"></div>

        <!-- screen loader -->
        <div class="screen_loader animate__animated fixed inset-0 z-[60] grid place-content-center bg-[#fafafa] dark:bg-[#060818]">
            <svg width="64" height="64" viewBox="0 0 135 135" xmlns="http://www.w3.org/2000/svg" fill="#4361ee">
                <path
                    d="M67.447 58c5.523 0 10-4.477 10-10s-4.477-10-10-10-10 4.477-10 10 4.477 10 10 10zm9.448 9.447c0 5.523 4.477 10 10 10 5.522 0 10-4.477 10-10s-4.478-10-10-10c-5.523 0-10 4.477-10 10zm-9.448 9.448c-5.523 0-10 4.477-10 10 0 5.522 4.477 10 10 10s10-4.478 10-10c0-5.523-4.477-10-10-10zM58 67.447c0-5.523-4.477-10-10-10s-10 4.477-10 10 4.477 10 10 10 10-4.477 10-10z"
                >
                    <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="-360 67 67" dur="2.5s" repeatCount="indefinite" />
                </path>
                <path
                    d="M28.19 40.31c6.627 0 12-5.374 12-12 0-6.628-5.373-12-12-12-6.628 0-12 5.372-12 12 0 6.626 5.372 12 12 12zm30.72-19.825c4.686 4.687 12.284 4.687 16.97 0 4.686-4.686 4.686-12.284 0-16.97-4.686-4.687-12.284-4.687-16.97 0-4.687 4.686-4.687 12.284 0 16.97zm35.74 7.705c0 6.627 5.37 12 12 12 6.626 0 12-5.373 12-12 0-6.628-5.374-12-12-12-6.63 0-12 5.372-12 12zm19.822 30.72c-4.686 4.686-4.686 12.284 0 16.97 4.687 4.686 12.285 4.686 16.97 0 4.687-4.686 4.687-12.284 0-16.97-4.685-4.687-12.283-4.687-16.97 0zm-7.704 35.74c-6.627 0-12 5.37-12 12 0 6.626 5.373 12 12 12s12-5.374 12-12c0-6.63-5.373-12-12-12zm-30.72 19.822c-4.686-4.686-12.284-4.686-16.97 0-4.686 4.687-4.686 12.285 0 16.97 4.686 4.687 12.284 4.687 16.97 0 4.687-4.685 4.687-12.283 0-16.97zm-35.74-7.704c0-6.627-5.372-12-12-12-6.626 0-12 5.373-12 12s5.374 12 12 12c6.628 0 12-5.373 12-12zm-19.823-30.72c4.687-4.686 4.687-12.284 0-16.97-4.686-4.686-12.284-4.686-16.97 0-4.687 4.686-4.687 12.284 0 16.97 4.686 4.687 12.284 4.687 16.97 0z"
                >
                    <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="360 67 67" dur="8s" repeatCount="indefinite" />
                </path>
            </svg>
        </div>

        <!-- scroll to top button -->
        <div class="fixed bottom-6 z-50 ltr:right-6 rtl:left-6" x-data="scrollToTop">
            <template x-if="showTopButton">
                <button
                    type="button"
                    class="btn btn-outline-primary animate-pulse rounded-full bg-[#fafafa] p-2 dark:bg-[#060818] dark:hover:bg-primary"
                    @click="goToTop"
                >
                    <svg width="24" height="24" class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            opacity="0.5"
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M12 20.75C12.4142 20.75 12.75 20.4142 12.75 20L12.75 10.75L11.25 10.75L11.25 20C11.25 20.4142 11.5858 20.75 12 20.75Z"
                            fill="currentColor"
                        />
                        <path
                            d="M6.00002 10.75C5.69667 10.75 5.4232 10.5673 5.30711 10.287C5.19103 10.0068 5.25519 9.68417 5.46969 9.46967L11.4697 3.46967C11.6103 3.32902 11.8011 3.25 12 3.25C12.1989 3.25 12.3897 3.32902 12.5304 3.46967L18.5304 9.46967C18.7449 9.68417 18.809 10.0068 18.6929 10.287C18.5768 10.5673 18.3034 10.75 18 10.75L6.00002 10.75Z"
                            fill="currentColor"
                        />
                    </svg>
                </button>
            </template>
        </div>

        
        <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
            <!-- start sidebar section -->
            <div :class="{'dark text-white-dark' : $store.app.semidark}">
                <nav
                    x-data="sidebar"
                    class="sidebar fixed bottom-0 top-0 z-50 h-full min-h-screen w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] transition-all duration-300"
                >
                    <div class="h-full bg-white dark:bg-[#0e1726]">
                        <div class="flex items-center justify-between px-4 py-3">
                            <a href="home.php" class="main-logo flex shrink-0 items-center">
                                <img class="ml-[5px]  flex-none" src="assets/images/logo.png" alt="image" width="140px"/>
                            </a>
                            <a
                                href="javascript:;"
                                class="collapse-icon flex h-8 w-8 items-center rounded-full transition duration-300 hover:bg-gray-500/10 rtl:rotate-180 dark:text-white-light dark:hover:bg-dark-light/10"
                                @click="$store.app.toggleSidebar()"
                            >
                                <svg class="m-auto h-5 w-5" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        opacity="0.5"
                                        d="M16.9998 19L10.9998 12L16.9998 5"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </a>
                        </div>
                        <ul
                            class="perfect-scrollbar relative h-[calc(100vh-80px)] space-y-0.5 overflow-y-auto overflow-x-hidden p-4 py-0 font-semibold"
                            x-data="{ activeDropdown: 'dashboard' }">

                            <h2 class="-mx-4 mb-1 flex items-center bg-white-light/30 px-7 py-3 font-extrabold uppercase dark:bg-dark dark:bg-opacity-[0.08]">
                                <svg
                                    class="hidden h-5 w-4 flex-none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                <span>Options</span>
                            </h2>

                            <li class="nav-item">
                                <ul>
                                    <li class="nav-item">
                                        <a href="ETP.php" class="group">
                                            <div class="flex items-center">
                                                <i class="fa-solid fa-angles-right"></i>
                                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">ETP</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ETP.php" class="group">
                                            <div class="flex items-center">
                                                <i class="fa-solid fa-angles-right" style="color: #347aea;"></i>
                                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Questionnaire</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="stp.php" class="group">
                                            <div class="flex items-center">
                                                <i class="fa-solid fa-angles-right"></i>
                                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">STP</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="Shea oil.php" class="group">
                                            <div class="flex items-center">
                                                <i class="fa-solid fa-angles-right"></i>
                                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Shea oil</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="Virgin Coconut oil.php" class="group">
                                            <div class="flex items-center">
                                                <i class="fa-solid fa-angles-right"></i>
                                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Virgin Coconut oil</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="Coconut oil.php" class="group">
                                            <div class="flex items-center">
                                                <i class="fa-solid fa-angles-right"></i>
                                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Coconut Oil</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="Mustard oil.php" class="group">
                                            <div class="flex items-center">
                                                <i class="fa-solid fa-angles-right"></i>
                                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Mustard oil</span>
                                            </div>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a href="Rice bran oil.php" class="group">
                                            <div class="flex items-center">
                                                <i class="fa-solid fa-angles-right"></i>
                                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Rice bran oil</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="Sun flower.php" class="group">
                                            <div class="flex items-center">
                                                <i class="fa-solid fa-angles-right"></i>
                                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Sun flower</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="20-HP.php" class="group">
                                            <div class="flex items-center">
                                                <i class="fa-solid fa-angles-right"></i>
                                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">20 bar High Pressure machineRBO</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="30-HP.php" class="group">
                                            <div class="flex items-center">
                                                <i class="fa-solid fa-angles-right"></i>
                                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">30 bar High Pressure RBO(memb)</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="1st frac Palm oil.php" class="group">
                                            <div class="flex items-center">
                                               <i class="fa-solid fa-angles-right"></i>
                                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">1st frac Palm oil</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="2nd frac Palm oil.php" class="group">
                                            <div class="flex items-center">
                                                <i class="fa-solid fa-angles-right"></i>
                                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">2nd frac Palm oil</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="30 bar palm pmf.php" class="group">
                                            <div class="flex items-center">
                                                <i class="fa-solid fa-angles-right"></i>
                                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">30 bar palm pmf</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- end sidebar section -->

            <div class="main-content flex min-h-screen flex-col">
                <!-- start header section -->
                <header class="z-40" :class="{'dark' : $store.app.semidark && $store.app.menu === 'horizontal'}">
                    <div class="shadow-sm">
                        <div class="relative flex w-full items-center bg-white px-5 py-2.5 dark:bg-[#0e1726]">
                            <div class="horizontal-logo flex items-center justify-between ltr:mr-2 rtl:ml-2 lg:hidden">
                                <a href="home.php" class="main-logo flex shrink-0 items-center">
                                    <img class="inline w-8 ltr:-ml-1 rtl:-mr-1" src="assets/images/logo.png" alt="image" />
                                    <span
                                        class="hidden align-middle text-2xl font-semibold transition-all duration-300 ltr:ml-1.5 rtl:mr-1.5 dark:text-white-light md:inline"
                                        ></span
                                    >
                                </a>

                                <a
                                    href="javascript:;"
                                    class="collapse-icon flex flex-none rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary ltr:ml-2 rtl:mr-2 dark:bg-dark/40 dark:text-[#d0d2d6] dark:hover:bg-dark/60 dark:hover:text-primary lg:hidden"
                                    @click="$store.app.toggleSidebar()"
                                >
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 7L4 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                        <path opacity="0.5" d="M20 12L4 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                        <path d="M20 17L4 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </a>
                            </div>
                            <div
                                x-data="header"
                                class="flex items-center space-x-1.5 ltr:ml-auto rtl:mr-auto rtl:space-x-reverse dark:text-[#d0d2d6] sm:flex-1 ltr:sm:ml-0 sm:rtl:mr-0 lg:space-x-2">
                                <div class="sm:ltr:mr-auto sm:rtl:ml-auto" x-data="{ search: false }" @click.outside="search = false">
                                    
                                </div>
                                <div>
                                    <a
                                        href="javascript:;"
                                        x-cloak
                                        x-show="$store.app.theme === 'light'"
                                        href="javascript:;"
                                        class="flex items-center rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                        @click="$store.app.toggleTheme('dark')"
                                    >
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="1.5" />
                                            <path d="M12 2V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                            <path d="M12 20V22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                            <path d="M4 12L2 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                            <path d="M22 12L20 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                            <path
                                                opacity="0.5"
                                                d="M19.7778 4.22266L17.5558 6.25424"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                            />
                                            <path
                                                opacity="0.5"
                                                d="M4.22217 4.22266L6.44418 6.25424"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                            />
                                            <path
                                                opacity="0.5"
                                                d="M6.44434 17.5557L4.22211 19.7779"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                            />
                                            <path
                                                opacity="0.5"
                                                d="M19.7778 19.7773L17.5558 17.5551"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                            />
                                        </svg>
                                    </a>
                                    <a
                                        href="javascript:;"
                                        x-cloak
                                        x-show="$store.app.theme === 'dark'"
                                        href="javascript:;"
                                        class="flex items-center rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                        @click="$store.app.toggleTheme('system')"
                                    >
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M21.0672 11.8568L20.4253 11.469L21.0672 11.8568ZM12.1432 2.93276L11.7553 2.29085V2.29085L12.1432 2.93276ZM21.25 12C21.25 17.1086 17.1086 21.25 12 21.25V22.75C17.9371 22.75 22.75 17.9371 22.75 12H21.25ZM12 21.25C6.89137 21.25 2.75 17.1086 2.75 12H1.25C1.25 17.9371 6.06294 22.75 12 22.75V21.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75V1.25C6.06294 1.25 1.25 6.06294 1.25 12H2.75ZM15.5 14.25C12.3244 14.25 9.75 11.6756 9.75 8.5H8.25C8.25 12.5041 11.4959 15.75 15.5 15.75V14.25ZM20.4253 11.469C19.4172 13.1373 17.5882 14.25 15.5 14.25V15.75C18.1349 15.75 20.4407 14.3439 21.7092 12.2447L20.4253 11.469ZM9.75 8.5C9.75 6.41182 10.8627 4.5828 12.531 3.57467L11.7553 2.29085C9.65609 3.5593 8.25 5.86509 8.25 8.5H9.75ZM12 2.75C11.9115 2.75 11.8077 2.71008 11.7324 2.63168C11.6686 2.56527 11.6538 2.50244 11.6503 2.47703C11.6461 2.44587 11.6482 2.35557 11.7553 2.29085L12.531 3.57467C13.0342 3.27065 13.196 2.71398 13.1368 2.27627C13.0754 1.82126 12.7166 1.25 12 1.25V2.75ZM21.7092 12.2447C21.6444 12.3518 21.5541 12.3539 21.523 12.3497C21.4976 12.3462 21.4347 12.3314 21.3683 12.2676C21.2899 12.1923 21.25 12.0885 21.25 12H22.75C22.75 11.2834 22.1787 10.9246 21.7237 10.8632C21.286 10.804 20.7293 10.9658 20.4253 11.469L21.7092 12.2447Z"
                                                fill="currentColor"
                                            />
                                        </svg>
                                    </a>
                                    <a
                                        href="javascript:;"
                                        x-cloak
                                        x-show="$store.app.theme === 'system'"
                                        href="javascript:;"
                                        class="flex items-center rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                        @click="$store.app.toggleTheme('light')"
                                    >
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3 9C3 6.17157 3 4.75736 3.87868 3.87868C4.75736 3 6.17157 3 9 3H15C17.8284 3 19.2426 3 20.1213 3.87868C21 4.75736 21 6.17157 21 9V14C21 15.8856 21 16.8284 20.4142 17.4142C19.8284 18 18.8856 18 17 18H7C5.11438 18 4.17157 18 3.58579 17.4142C3 16.8284 3 15.8856 3 14V9Z"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                            />
                                            <path opacity="0.5" d="M22 21H2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                            <path opacity="0.5" d="M15 15H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                        </svg>
                                    </a>
                                </div>

                                <div class="dropdown flex-shrink-0" x-data="dropdown" @click.outside="open = false">
                                    <a href="javascript:;" class="group relative" @click="toggle()">
                                        <span
                                            ><img
                                                class="h-9 w-9 rounded-full object-cover saturate-50 group-hover:saturate-100"
                                                src="assets/images/user-profile.jpeg"
                                                alt="image"
                                        /></span>
                                    </a>
                                    <ul
                                        x-cloak
                                        x-show="open"
                                        x-transition
                                        x-transition.duration.300ms
                                        class="top-11 w-[230px] !py-0 font-semibold text-dark ltr:right-0 rtl:left-0 dark:text-white-dark dark:text-white-light/90"
                                    >
                                        <li>
                                            <div class="flex items-center px-4 py-4">
                                                <div class="flex-none">
                                                    <img class="h-10 w-10 rounded-md object-cover" src="assets/images/user-profile.jpeg" alt="image" />
                                                </div>
                                                <div class="truncate ltr:pl-4 rtl:pr-4">
                                                    <h4 class="text-base">
                                                        User<span class="rounded bg-success-light px-1 text-xs text-success ltr:ml-2 rtl:ml-2">Pro</span>
                                                    </h4>
                                                    <a
                                                        class="text-black/60 hover:text-primary dark:text-dark-light/60 dark:hover:text-white"
                                                        href="javascript:;"
                                                        ></a
                                                    >
                                                </div>
                                            </div>
                                        </li>
                                        <li class="border-t border-white-light dark:border-white-light/10">
                                            <a href="index.php" class="!py-3 text-danger" @click="toggle">
                                                <svg
                                                    class="h-4.5 w-4.5 shrink-0 rotate-90 ltr:mr-2 rtl:ml-2"
                                                    width="18"
                                                    height="18"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                        opacity="0.5"
                                                        d="M17 9.00195C19.175 9.01406 20.3529 9.11051 21.1213 9.8789C22 10.7576 22 12.1718 22 15.0002V16.0002C22 18.8286 22 20.2429 21.1213 21.1215C20.2426 22.0002 18.8284 22.0002 16 22.0002H8C5.17157 22.0002 3.75736 22.0002 2.87868 21.1215C2 20.2429 2 18.8286 2 16.0002L2 15.0002C2 12.1718 2 10.7576 2.87868 9.87889C3.64706 9.11051 4.82497 9.01406 7 9.00195"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                        stroke-linecap="round"
                                                    />
                                                    <path
                                                        d="M12 15L12 2M12 2L15 5.5M12 2L9 5.5"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />
                                                </svg>
                                                Sign Out
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- end header section -->

                

                <div class="animate__animated p-6" :class="[$store.app.animation]">
                    <!-- start main content section -->
                    <div x-data="sales">
                    <ul class="flex space-x-2 rtl:space-x-reverse">
                        <li>
                            <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
                        </li>
                        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                            <span>Questionnaire</span>
                        </li>
                    </ul><br>

                    <form method="post">                                    
                        <div class="space-y-5 p-5" style="background-color:#f3f4f4;">

                            
                            <div class="mb-5 flex items-center dark:text-white-light">
                                <h1 class="text-lg font-semibold">Details</h1>
                                <div x-data="dropdown" @click.outside="open = false" class="dropdown ltr:ml-auto rtl:mr-auto">                                            
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                <div>
                                    <label for="slurry">NAME OF THE SLURRY</label>
                                    <input type="text" name="one" placeholder="" class="form-input" />
                                </div>
                                <div>
                                    <label for="">NATURE OF THE SOLIDS</label>
                                    
                                    <select name="" id="moistureLevelSelect" class="form-input">
                                        <option disabled selected>----- Select -----</option>
                                        <option value="SLIMY">SLIMY</option>
                                        <option value="FIBOROUS">FIBOROUS</option>
                                        <option value="OILY">OILY</option>
                                        <option value="PASTY">PASTY</option>
                                        <option value="SETTALABLE">SETTALABLE</option>
                                        <option value="COMPRESSIBLE">COMPRESSIBLE</option>
                                        <option value="OTHERS">OTHERS</option>
                                    </select>
                                </div>
                                <div id="popup" class="popup">
                                    If pasty or slimy, then the moisture will be high and will not be easily filtered, so a trial is recommended or discuss with the client.
                                </div>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        const moistureLevelSelect = document.getElementById('moistureLevelSelect');
                                        const popup = document.getElementById('popup');

                                        moistureLevelSelect.addEventListener('change', function () {
                                            if (moistureLevelSelect.value === 'PASTY' || moistureLevelSelect.value === 'SLIMY') {
                                                popup.style.display = 'block';
                                            } else {
                                                popup.style.display = 'none';
                                            }
                                        });
                                    });

                                    // document.addEventListener('DOMContentLoaded', function () {
                                    //     const moistureLevelSelect = document.getElementById('moistureLevelSelect');

                                    //     moistureLevelSelect.addEventListener('change', function () {
                                    //         if (moistureLevelSelect.value === 'PASTY' || moistureLevelSelect.value === 'SLIMY') {
                                    //             // Use alert to show the message
                                    //             alert("If pasty or slimy, then the moisture will be high and will not be easily filtered, so a trial is recommended or discuss with the client.");
                                    //         }
                                    //     });
                                    // });
                                </script>
                                <div>
                                    <label for="gridEmail">SOLID PARTICLE SIZE (Min to Max in microns)</label>
                                    <input id="" name="three" type="text" placeholder="" class="form-input" onkeyup="suggestCloth(this.value)" />
                                    <p id="suggestion" style="color: red;"></p>
                                </div>
                            </div>

                            <script>
                                function suggestCloth(value) {
                                    const parsedValue = parseFloat(value);
                                    if (isNaN(parsedValue)) {
                                        document.getElementById("suggestion").textContent = "Please enter a valid number.";
                                        return;
                                    }

                                    const suggestions = [
                                        { range: [0, 3], text: "Suggest 0-3 micron cloth" },
                                        { range: [3, 5], text: "Suggest 3-5 micron cloth" },
                                        { range: [5, 10], text: "Suggest 5-10 micron cloth" },
                                        { range: [10, 20], text: "Suggest 10-20 micron cloth" },
                                        { range: [20, 30], text: "Suggest 20-30 micron cloth" },
                                        { range: [30, 40], text: "Suggest 30-40 micron cloth" },
                                        { range: [40, 50], text: "Suggest 40-50 micron cloth" },
                                        { range: [50, 100], text: "Suggest 50-100 micron cloth" },
                                        { range: [1000, Infinity], text: "More than 1mm (1000 micron) not recommended to be checked" },
                                    ];

                                    const suggestion = suggestions.find(sugg => parsedValue >= sugg.range[0] && parsedValue < sugg.range[1]);

                                    if (suggestion) {
                                        document.getElementById("suggestion").textContent = suggestion.text;
                                    } else {
                                        document.getElementById("suggestion").textContent = "Value is out of range.";
                                    }
                                }

                            </script>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                
                                <div>
                                    <label for="abrasiveInput">ABRASIVE NATURE OF PARTICLES</label>
                                    <input id="abrasiveInput" name="four" type="text" placeholder="YES / NO" class="form-input" onkeyup="checkAbrasiveNature(this.value)"/>
                                </div>

                                <div>
                                    <label for="specificGravityInput">SPECIFIC GRAVITY / DENSITY</label>
                                    <input id="specificGravityInput" type="text" name="five" placeholder="" class="form-input" onkeyup="checkSpecificGravity(this.value)" />
                                </div>

                                <div>
                                    <label for="viscosity">VISCOSITY</label>
                                    <input id="viscosityInput" type="text" name="six" placeholder="" class="form-input" onkeyup="checkViscosity(this.value)" />
                                </div>

                                <script>
                                    function checkAbrasiveNature(value) {
                                        const trimmedValue = value.trim().toLowerCase();
                                        if (trimmedValue === "yes") {
                                            alert("If yes, screw pump not recommended for feeding and customer is advised for rubber lined pump");
                                        }
                                    }

                                    function checkSpecificGravity(value) {
                                        const numericValue = parseFloat(value);
                                        if (!isNaN(numericValue) && numericValue > 2.5) {
                                            alert("More than 2.5 specific gravity or density, then top feed preferable");
                                        }
                                    }

                                    function checkViscosity(value) {
                                        const numericValue = parseFloat(value);
                                        if (!isNaN(numericValue) && numericValue > 3000) {
                                            alert("More than 3000 cp, check feasibility, not advised");
                                        }
                                    }
                                </script>

                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                <div>
                                    <label for="temperatureInput">TEMPERATURE OF FILTRATION</label>
                                    <input id="temperatureInput" type="text" name="seven" placeholder="" class="form-input" onkeyup="suggestTemperature(this.value)" />
                                    <p id="temperatureSuggestion" style="color:red;"></p>
                                </div>

                                <div>
                                    <label for="phValueInput">PH VALUE OF INPUT MATERIAL</label>
                                    <input id="phValueInput" type="text" name="eight" placeholder="" class="form-input" onkeyup="suggestPhValue(this.value)" />
                                    <p id="phValueSuggestion" style="color:red;"></p>
                                </div>
                                <div>
                                    <label for="processGoalSelect">PROCESS GOAL</label>
                                    <select name="" id="processGoalSelect" class="form-input">
                                        <option disabled selected>----- Select -----</option>
                                        <option value="FILTERED"><b>Filtrate liquid as product and filtered cake as waste</b> </option>
                                        <option value="FILTRATE">Filtered cake as product and filtrate as waste</option>
                                        <option value="BOTH">Both filtrate and cake as waste</option>
                                    </select>
                                </div>
                                <div id="popup1" class="popup1">
                                Membrane filter press or as per customer request 
                                </div>

                                <script>
                                    function suggestTemperature(value) {
                                        const numericValue = parseFloat(value);

                                        if (isNaN(numericValue)) {
                                            document.getElementById("temperatureSuggestion").textContent = "Please enter a valid number.";
                                            return;
                                        }

                                        if (numericValue >= 0 && numericValue <= 70) {
                                            document.getElementById("temperatureSuggestion").textContent = "Up to 70 deg @ 7 bar OK";
                                        } else if (numericValue >= 80 && numericValue <= 90) {
                                            document.getElementById("temperatureSuggestion").textContent = "From 80-90 deg @ 4 bar OK";
                                        } else if (numericValue > 90 && numericValue <= 110) {
                                            document.getElementById("temperatureSuggestion").textContent = "More than 90 deg high temperature plate suggested up to 110 deg";
                                        } else if (numericValue > 110 && numericValue <= 170) {
                                            document.getElementById("temperatureSuggestion").textContent = "More than 110 deg cast iron plate suggested up to 170 deg";
                                        } else {
                                            document.getElementById("temperatureSuggestion").textContent = "Value is out of range.";
                                        }
                                    }

                                    function suggestPhValue(value) {
                                        const numericValue = parseFloat(value);

                                        if (isNaN(numericValue)) {
                                            document.getElementById("phValueSuggestion").textContent = "Please enter a valid number.";
                                            return;
                                        }

                                        if (numericValue <= 6) {
                                            document.getElementById("phValueSuggestion").textContent = "Acidic (FRP lining recommended)";
                                        } else {
                                            document.getElementById("phValueSuggestion").textContent = "";
                                        }
                                    }

                                    document.addEventListener('DOMContentLoaded', function () {
                                        const processGoalSelect = document.getElementById('processGoalSelect');
                                        const popup1 = document.getElementById('popup1');

                                        processGoalSelect.addEventListener('change', function () {
                                            if (processGoalSelect.value === 'FILTRATE') {
                                                popup1.style.display = 'block';
                                            } else {
                                                popup1.style.display = 'none';
                                            }
                                        });
                                    });

                                </script>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                
                                <div>
                                    <label for="machineRequired">TYPE OF MACHINE REQUIRED</label>
                                    <select name="" id="" class="form-input">
                                        <option disabled selected>----- Select -----</option>
                                        <option value="RECESSED">RECESSED PLATES</option>
                                        <option value="MEMEBRANE">MEMEBRANE</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="filterPressRequired">TYPE OF FILTER PRESS REQUIRED</label>
                                    <select name="" id="" class="form-input">
                                        <option disabled selected>----- Select -----</option>
                                        <option value="MANUAL">MANUAL</option>
                                        <option value="HYDRAULIC">HYDRAULIC OPERATED</option>
                                        <option value="AUTOMATIC">AUTOMATIC</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="filterateOutlet">FILTRATE OULTLET </label>
                                    <select name="" id="" class="form-input">
                                        <option disabled selected>----- Select -----</option>
                                        <option value="ONESIDE">ONE SIDE DISCHARGE </option>
                                        <option value="BOTHSIDES">BOTH SIDES DISCHARGE </option>
                                        <option value="CLOSED">CLOSED DISCHARGE</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                
                                <div>
                                    <label for="cakeWashingInput">WHETHER CAKE WASHING REQUIRED</label>
                                    <input id="cakeWashingInput" type="text" name="ten" placeholder="YES / NO" class="form-input" onkeyup="checkCakeWashing(this.value)" />
                                </div>
                                <div>
                                    <label for="coreBlowInput">WHETHER CENTRE CORE BLOW PROVISION </label>
                                    <input id="coreBlowInput" type="text" name="eleven" placeholder="YES / NO" class="form-input" onkeyup="checkCoreBlow(this.value)" />
                                </div>
                                <div>
                                    <label for="cakeAiringInput">WHETHER CAKE AIRING PROVISION REQUIRED</label>
                                    <input id="cakeAiringInput" type="text" name="twelve" placeholder="YES / NO" class="form-input" onkeyup="checkCakeAiring(this.value)" />
                                </div>

                                <script>
                                    function checkCakeWashing(value) {
                                        const trimmedValue = value.trim().toLowerCase();
                                        if (trimmedValue === "yes") {
                                            alert("If yes, provide cake washing and 4 corner plates to be selected (but check if it’s really required)");
                                        }
                                    }

                                    function checkCoreBlow(value) {
                                        const trimmedValue = value.trim().toLowerCase();
                                        if (trimmedValue === "yes") {
                                            alert("If Yes, Core blow provision to be considered");
                                        }
                                    }

                                    function checkCakeAiring(value) {
                                        const trimmedValue = value.trim().toLowerCase();
                                        if (trimmedValue === "yes") {
                                            alert("If Yes, Cake airing provision to be considered");
                                        }
                                    }
                                </script>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                
                                <div>
                                    <label for="zeroLeakageInput" class="zeroLeakageInput" style="font-size: 13px;">WHETHER ZERO LEAKAGE (DRIPPING) OF FILTRATE IS REQUIRED <u>(extra cost will be applicable)</u></label>
                                    <input id="zeroLeakageInput" type="text" name="ten" placeholder="YES / NO" class="form-input" onkeyup="checkZeroLeakage(this.value)" />
                                    <p style="color: #0033ff;"><b>NOTE:</b> Cloth dripping cannot be prevented in normal filter press</p>
                                </div>

                                <div>
                                    <label for="installationAreaInput">AREA AVAILABLE FOR INSTALLATION OF FILTER PRESS <br><br></label>
                                    <input id="installationAreaInput" type="text" name="eleven" placeholder="" class="form-input" onkeyup="checkInstallationArea(this.value)" />
                                </div>

                                <div>
                                    <label for="commissioningSupportInput">WHETHER COMMISSIONING SUPPORT <br> REQUIRED</label>
                                    <input id="commissioningSupportInput" type="text" name="twelve" placeholder="YES / NO" class="form-input" onkeyup="checkCommissioningSupport(this.value)" />
                                </div>

                                <script>
                                    function checkZeroLeakage(value) {
                                        const trimmedValue = value.trim().toLowerCase();
                                        if (trimmedValue === "yes") {
                                            alert("If yes, then CGR plate to be considered (Caulked Gasket recessed chamber)");
                                        }
                                    }

                                    function checkInstallationArea(value) {
                                        const trimmedValue = value.trim();
                                        if (trimmedValue.length > 0) {
                                            alert("If space is given, check after selection if the selected machine size can be installed");
                                        }
                                    }

                                    function checkCommissioningSupport(value) {
                                        const trimmedValue = value.trim().toLowerCase();
                                        if (trimmedValue === "yes") {
                                            alert("If commissioning needed, add the cost separately in the offer based on the location and manpower required.");
                                        }
                                    }
                                </script>
                            </div>  
                            
                            
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

                                <div>
                                    <label for="accessoriesRequired">ACCESSORIES REQUIRED</label>
                                    <select name="" id="accessoriesRequired" class="form-input">
                                        <option disabled selected>----- Select -----</option>
                                        <option value="FEEDPUMP">FILTER PRESS FEED PUMP</option>
                                        <option value="FILTERCLOTH">FILTER CLOTH</option>
                                        <option value="DRIPTRAY">DRIP TRAY</option>
                                        <option value="SHIFTING">PLATE SHIFTING MECHANISM</option>
                                        <option value="AUTOCONTROL">AUTO CONTROL PANNEL</option>
                                        <option value="FOOD">FOOD/ PHARMACEUTICAL  GRADE DESIGN</option>
                                        <option value="HACCP">HACCP STANDARD</option>
                                        <option value="CLADDING">ANY OTHER SPECIAL CLADDING</option>
                                    </select>
                                </div>

                                <div class="relative inline-flex align-center mx-4">
                                    <button type="submit" name="submit" class="btn btn-primary mt-6">Save</button> 
                                </div>

                            </div>

                             

                        </div>


                    </form>


                        

                        <div class="pt-5">
                            <div class="mb-6 grid gap-8 xl:grid-cols-3">
                                <div class="panel h-full xl:col-span-2">
                                    

                                    <?php
                                    if(isset($_POST['submit']))
                                    {
                                    $cid=$_POST['cid'];
                                    $name=$_POST['name'];
                                    $one=$_POST['one'];
                                    $two=$_POST['two'];
                                    $three=$_POST['three'];
                                    $four=$_POST['four'];
                                    $five=$_POST['five'];
                                    $six=$_POST['six'];
                                    $seven=$_POST['seven'];
                                    $eight=$_POST['eight'];
                                    $nine=$_POST['nine'];
                                    $ten=$_POST['ten'];
                                    $eleven=$_POST['eleven'];
                                    $twelve=$_POST['twelve'];
                                    $thirteen=$_POST['thirteen'];
                                    $vol1=($thirteen/4.145);
                                    $fix1=($vol1/30);
                                    $vol2=($thirteen/7.7);
                                    $fix2=($vol2/40);
                                    $vol3=($thirteen/17.4);
                                    $fix3=($vol3/50);
                                    $vol4=($thirteen/19.3);
                                    $fix4=($vol4/60);
                                    $vol5=($thirteen/27.2);
                                    $fix5=($vol5/100);
                                    $vol6=($thirteen/31.6);
                                    $fix6=($vol6/100);
                                    $vol7=($thirteen/35.8);
                                    $fix7=($vol7/120);
                                    $vol8=($thirteen/66);
                                    $fix8=($vol8/120);
                                    $jetone=mysqli_query($db,"INSERT INTO etp (cid, name, one, two, three, four, five, six, seven, eight, nine, ten, eleven, twelve, thirteen, vol1, fix1, vol2, fix2, vol3, fix3, vol4, fix4, vol5, fix5, vol6, fix6, vol7, fix7, vol8, fix8) VALUES('$cid', '$name', '$one', '$two', '$three', '$four', '$five', '$six', '$seven', '$eight', '$nine', '$ten', '$eleven', '$twelve', '$thirteen', '$vol1', '$fix1', '$vol2', '$fix2', '$vol3', '$fix3', '$vol4', '$fix4', '$vol5', '$fix5', '$vol6', '$fix6', '$vol7', '$fix7', '$vol8', '$fix8')");
                                    }
                                    ?>

                                    <form method="post">                                    
                                        <div class="space-y-5">

                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                <div>
                                                    <label for="gridEmail">Customer Id</label>
                                                    <input type="text" name="cid" placeholder="" class="form-input" />
                                                </div>
                                                <div>
                                                    <label for="gridPassword">Customer Name</label>
                                                    <input type="text" name="name" placeholder="" class="form-input"/>
                                                </div>
                                            </div>
                                            <div class="mb-5 flex items-center dark:text-white-light">
                                                <h1 class="text-lg font-semibold">Details</h1>
                                                <div x-data="dropdown" @click.outside="open = false" class="dropdown ltr:ml-auto rtl:mr-auto">                                            
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                <div>
                                                    <label for="gridEmail">TOTAL VOLUME TO BE FILTERED / DAY (m3 /hr)</label>
                                                    <input id="column1" type="text" name="one" placeholder="" class="form-input" />
                                                </div>
                                                <div>
                                                    <label for="gridPassword">TOTAL NO. OF HOURS OF FEED MATERIAL PRODUCTION (hrs)</label>
                                                    <input id="column2" type="text" name="two" value="24" placeholder="" class="form-input"/>
                                                    <span class="mt-3" style="color:red">By defualt 24 Hrs</span>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                <div>
                                                    <label for="gridEmail">CAPACITY OF FEED MATERIAL PRODUCED (m<sup>3</sup>/day)</label>
                                                    <input id="column3Value" name="three" type="text" placeholder="" class="form-input" />
                                                </div>
                                                <div>
                                                    <label for="gridPassword">CAPACITY OF FEED MATERIAL TO BE FILTERED PER DAY (ltrs)</label>
                                                    <input id="column4Value" name="four" type="text" placeholder="" class="form-input" />
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                <div>
                                                    <label for="gridEmail">SOLID PERCENTAGE*</label>
                                                    <input id="percentageInput" type="text" name="five" value="5%" placeholder="" class="form-input" />
                                                </div>
                                                <div>
                                                    <label for="gridPassword">DRY SOLIDS PER DAY</label>
                                                    <input id="column5Value" type="text" name="six" placeholder="" class="form-input" />
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                <div>
                                                    <label for="gridEmail">MOISTURE CONSIDERED IN THE CAKE</label>
                                                    <input id="column6Value" type="text" name="seven" placeholder="" value="35" class="form-input"/>
                                                    <span class="mt-3" style="color:red">By defualt 35</span>
                                                </div>
                                                <div>
                                                    <label for="gridPassword">SO DRY CAKE SOLIDS IN THE CAKE</label>
                                                    <input id="column7Value" type="text" name="eight" placeholder="" value="65" class="form-input" readonly/>
                                                    <span class="mt-3" style="color:red">By defualt 65</span>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                <div>
                                                    <label for="gridEmail">TOTAL WET CAKE PER DAY (Kg/Liters)</label>
                                                    <input id="column8Value" type="text" name="nine" placeholder="" class="form-input" required/>
                                                </div>
                                                <div>
                                                    <label for="gridPassword">FILTER PRESS OPERATING HOURS PER DAY (hrs)</label>
                                                    <input id="column9Value" type="text" name="ten" placeholder="" class="form-input" />
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                <div>
                                                    <label for="gridEmail">EACH BATCH OPERATING HOURS CONSIDERED (hrs)</label>
                                                    <input id="column10Value" type="text" name="eleven" placeholder="" class="form-input" />
                                                </div>
                                                <div>
                                                    <label for="gridPassword">NUMBER OF BATCHES PER DAY CONSIDERED</label>
                                                    <input id="column11Value" type="text" name="twelve" placeholder="" class="form-input" />
                                                </div>
                                            </div>                                           
                                                
                                            <div class="col-md-6">
                                                <label for="ctnEmail">EACH BATCH SHOULD HOLD WET CAKE OF</label>
                                                <input id="column12Value" type="text" name="thirteen" placeholder="" class="form-input" required readonly/>
                                            </div>

                                            <div class="relative inline-flex align-middle">
                                                <button type="submit" name="submit" class="btn btn-primary mt-6">Save</button> 
                                            </div> 
                                        </div>
                                    </form>
                                    <button class="btn btn-primary mt-6" onclick="calculateColumns()">Check</button>
                                </div>

                                <script>
                                // Get references to the input elements
                                const column1Input = document.getElementById("column1");
                                const column2Input = document.getElementById("column2");
                                const column3Value = document.getElementById("column3Value");
                                const column4Value = document.getElementById("column4Value");
                                const percentageInput = document.getElementById("percentageInput");
                                const column5Value = document.getElementById("column5Value"); 
                                const column6Input = document.getElementById("column6Value");
                                const column7Value = document.getElementById("column7Value");
                                const column8Value = document.getElementById("column8Value");
                                const column9Value = document.getElementById("column9Value");
                                const column10Value = document.getElementById("column10Value");
                                const column11Value = document.getElementById("column11Value");
                                const column12Value = document.getElementById("column12Value");

                                // Add event listeners to update the third, fourth, fifth, and seventh columns
                                column1Input.addEventListener("input", updateThirdFourthFifthAndSeventhColumns);
                                column2Input.addEventListener("input", updateThirdFourthFifthAndSeventhColumns);
                                column3Value.addEventListener("input", updateFourthFifthAndSeventhColumns);
                                percentageInput.addEventListener("input", updateFifthAndSeventhColumns);

                                column3Value.addEventListener("input", updateTwelfthColumn);
                                percentageInput.addEventListener("input", updateTwelfthColumn);
                                column6Input.addEventListener("input", updateTwelfthColumn);
                                column2Input.addEventListener("input", updateTwelfthColumn);
                                column4Value.addEventListener("input", updateTwelfthColumn);
                                column5Value.addEventListener("input", updateTwelfthColumn);
                                column7Value.addEventListener("input", updateTwelfthColumn);

                                // New event listener for Column 5
                                column5Value.addEventListener("input", updateSeventhColumn);

                                // New event listener for Column 6
                                column6Input.addEventListener("input", updateSeventhColumn);

                                // New event listener for Column 7
                                column7Value.addEventListener("input", updateEighthColumn);

                                // New event listener for Column 9 and Column 10
                                column9Value.addEventListener("input", updateEleventhColumn);
                                column10Value.addEventListener("input", updateEleventhColumn);
                                column5Value.addEventListener("input", updateEleventhColumn);

                                // New event listener for Column 11
                                column11Value.addEventListener("input", updateTwelfthColumn);

                                // Another event listener for Column 1
                                column1Input.addEventListener("input", updateEleventhColumn);

                                // Function to update the third, fourth, fifth, and seventh columns
                                function updateThirdFourthFifthAndSeventhColumns() {
                                    const column1Value = parseFloat(column1Input.value);
                                    const column2Value = parseFloat(column2Input.value);
                                    const sum = column1Value * column2Value;
                                    if (!isNaN(sum)) {
                                        column3Value.value = sum;
                                        updateFourthFifthAndSeventhColumns();
                                    } else {
                                        column3Value.value = "";
                                        column4Value.value = "";
                                        column5Value.value = "";
                                        updateSeventhColumn();
                                    }
                                }

                                // Function to update the fourth, fifth, and seventh columns
                                function updateFourthFifthAndSeventhColumns() {
                                    const column3ValueNumber = parseFloat(column3Value.value);
                                    const multipliedValue = column3ValueNumber * 1000;
                                    if (!isNaN(multipliedValue)) {
                                        column4Value.value = multipliedValue;
                                        updateFifthAndSeventhColumns();
                                    } else {
                                        column4Value.value = "";
                                        column5Value.value = "";
                                        updateSeventhColumn();
                                    }
                                }

                                // Function to update the fifth and seventh columns
                                function updateFifthAndSeventhColumns() {
                                    const column4ValueNumber = parseFloat(column4Value.value);
                                    const percentage = parseFloat(percentageInput.value) / 100;
                                    if (!isNaN(column4ValueNumber) && !isNaN(percentage)) {
                                        const fifthValue = column4ValueNumber * percentage;
                                        column5Value.value = isNaN(fifthValue) ? "" : fifthValue;
                                        updateSeventhColumn();
                                    } else {
                                        column5Value.value = "";
                                        updateSeventhColumn();
                                    }
                                }

                                // Function to update the seventh column (Column 6 value - 100)
                                function updateSeventhColumn() {
                                    const column6ValueNumber = parseFloat(column6Input.value);
                                    if (!isNaN(column6ValueNumber)) {
                                        const seventhValue = 100 - column6ValueNumber;
                                        column7Value.value = isNaN(seventhValue) ? "" : seventhValue;
                                        updateEighthColumn(); 
                                        // Also update Column 8 when updating Column 7
                                    } else {
                                        column7Value.value = "";
                                        column8Value.value = "";
                                        updateTwelfthColumn();
                                    }
                                }

                                // Function to update the eighth column (Column 6 value / Column 7 value)
                                function updateEighthColumn() {
                                    const column5ValueNumber = parseFloat(column5Value.value);
                                    const column7ValueNumber = parseFloat(column7Value.value);
                                    if (!isNaN(column5ValueNumber) && !isNaN(column7ValueNumber) && column7ValueNumber !== 0) {
                                        const eighthValue = (column5ValueNumber * 100) / column7ValueNumber;
                                        column8Value.value = isNaN(eighthValue) ? "" : eighthValue;
                                    } else {
                                        column8Value.value = "";
                                    }
                                }

                                // Function to update the eleventh column (Column 9 value / Column 10 value)
                                function updateEleventhColumn() {
                                    const column9ValueNumber = parseFloat(column9Value.value);
                                    const column10ValueNumber = parseFloat(column10Value.value);
                                    if (!isNaN(column9ValueNumber) && !isNaN(column10ValueNumber) && column10ValueNumber !== 0) {
                                        const eleventhValue = column9ValueNumber / column10ValueNumber;
                                        column11Value.value = isNaN(eleventhValue) ? "" : eleventhValue;
                                        updateTwelfthColumn(); // Also update Column 12 when updating Column 11
                                    } else {
                                        column11Value.value = "";
                                        updateTwelfthColumn(); // Update Column 12 even if Column 11 is cleared
                                    }
                                }

                                // Function to update the twelfth column (Column 8 value / Column 11 value)
                                function updateTwelfthColumn() {
                                    const column8ValueNumber = parseFloat(column8Value.value);
                                    const column11ValueNumber = parseFloat(column11Value.value);

                                    // Check if Column 11 value is valid
                                    if (!isNaN(column11ValueNumber) && column11ValueNumber !== 0) {
                                        const twelfthValue = column8ValueNumber / column11ValueNumber;

                                        // Define variables needed for calculations within this function
                                        const column5ValueNumber = parseFloat(column5Value.value);
                                        const column9ValueNumber = parseFloat(column9Value.value);
                                        const column10ValueNumber = parseFloat(column10Value.value);

                                        // Update column12Value based on additional input fields
                                        if (!isNaN(column5ValueNumber) && !isNaN(column9ValueNumber) && !isNaN(column10ValueNumber)) {
                                            const updatedTwelfthValue = twelfthValue;

                                            // Update column12Value with the updated value
                                            column12Value.value = isNaN(updatedTwelfthValue) ? "" : updatedTwelfthValue.toFixed(2);
                                        } else {
                                            column12Value.value = "";
                                        }
                                    } else {
                                        column12Value.value = "";
                                    }
                                }

                                function calculateColumns() {
                                //32
                                const column12ValueNumber = parseFloat(column12Value.value);
                                const column13ValueNumber = Math.ceil(column12ValueNumber / 4.459);
                                const column14ValueNumber = Math.ceil(column12ValueNumber / 7.7);
                                const column15ValueNumber = Math.ceil(column12ValueNumber / 17.4);
                                const column16ValueNumber = Math.ceil(column12ValueNumber / 19.3);
                                const column17ValueNumber = Math.ceil(column12ValueNumber / 27.2);
                                const column18ValueNumber = Math.ceil(column12ValueNumber / 31.6);
                                const column19ValueNumber = Math.ceil(column12ValueNumber / 35.8);
                                const column20ValueNumber = Math.ceil(column12ValueNumber / 43.8);
                                const column202ValueNumber = Math.ceil(column12ValueNumber / 56.83);

                                //32memb
                                const column1300ValueNumber = Math.ceil(column12ValueNumber / 9);
                                const column1400ValueNumber = Math.ceil(column12ValueNumber / 15);
                                const column1500ValueNumber = Math.ceil(column12ValueNumber / 30);
                                const column1600ValueNumber = Math.ceil(column12ValueNumber / 34.5);
                                const column1700ValueNumber = Math.ceil(column12ValueNumber / 37);
                                const column1800ValueNumber = Math.ceil(column12ValueNumber / 60);
                                const column1900ValueNumber = Math.ceil(column12ValueNumber / 110);

                                //40
                                const column130ValueNumber = Math.ceil(column12ValueNumber / 9.9);
                                const column140ValueNumber = Math.ceil(column12ValueNumber / 22.5);
                                const column150ValueNumber = Math.ceil(column12ValueNumber / 24.4);
                                const column160ValueNumber = Math.ceil(column12ValueNumber / 34.37);
                                const column170ValueNumber = Math.ceil(column12ValueNumber / 39.52);
                                const column180ValueNumber = Math.ceil(column12ValueNumber / 44.9);
                                const column190ValueNumber = Math.ceil(column12ValueNumber / 54.6);
                                const column200ValueNumber = Math.ceil(column12ValueNumber / 66.14);

                                //40memb
                                const column13011ValueNumber = Math.ceil(column12ValueNumber / 40);
                                const column14011ValueNumber = Math.ceil(column12ValueNumber / 46);
                                const column15011ValueNumber = Math.ceil(column12ValueNumber / 52);
                                const column16011ValueNumber = Math.ceil(column12ValueNumber / 76);
                                const column17011ValueNumber = Math.ceil(column12ValueNumber / 138);

                                const column21ValueNumber = Math.ceil(column13ValueNumber / 30);
                                const column22ValueNumber = Math.ceil(column14ValueNumber / 40);
                                const column23ValueNumber = Math.ceil(column15ValueNumber / 50);
                                const column24ValueNumber = Math.ceil(column16ValueNumber / 60);
                                const column25ValueNumber = Math.ceil(column17ValueNumber / 70);
                                const column26ValueNumber = Math.ceil(column18ValueNumber / 80);
                                const column27ValueNumber = Math.ceil(column19ValueNumber / 120);
                                const column28ValueNumber = Math.ceil(column20ValueNumber / 120);
                                const column282ValueNumber = Math.ceil(column20ValueNumber / 120);

                                //32memb
                                const column2100ValueNumber = Math.ceil(column1300ValueNumber / 30);
                                const column2200ValueNumber = Math.ceil(column1400ValueNumber / 40);
                                const column2300ValueNumber = Math.ceil(column1500ValueNumber / 50);
                                const column2400ValueNumber = Math.ceil(column1600ValueNumber / 60);
                                const column2500ValueNumber = Math.ceil(column1700ValueNumber / 70);
                                const column2600ValueNumber = Math.ceil(column1800ValueNumber / 80);
                                const column2700ValueNumber = Math.ceil(column1900ValueNumber / 120);

                                //40
                                const column210ValueNumber = Math.ceil(column130ValueNumber / 30);
                                const column220ValueNumber = Math.ceil(column140ValueNumber / 40);
                                const column230ValueNumber = Math.ceil(column150ValueNumber / 50);
                                const column240ValueNumber = Math.ceil(column160ValueNumber / 60);
                                const column250ValueNumber = Math.ceil(column170ValueNumber / 70);
                                const column260ValueNumber = Math.ceil(column180ValueNumber / 80);
                                const column270ValueNumber = Math.ceil(column190ValueNumber / 120);
                                const column280ValueNumber = Math.ceil(column200ValueNumber / 120);

                                //40memb
                                const column21011ValueNumber = Math.ceil(column13011ValueNumber / 30);
                                const column22011ValueNumber = Math.ceil(column14011ValueNumber / 40);
                                const column23011ValueNumber = Math.ceil(column15011ValueNumber / 50);
                                const column24011ValueNumber = Math.ceil(column16011ValueNumber / 60);
                                const column25011ValueNumber = Math.ceil(column17011ValueNumber / 70);

                                const isTrue1 = column21ValueNumber <= 1;
                                const isTrue2 = column22ValueNumber <= 1;
                                const isTrue3 = column23ValueNumber <= 1;
                                const isTrue4 = column24ValueNumber <= 1;
                                const isTrue5 = column25ValueNumber <= 1;
                                const isTrue6 = column26ValueNumber <= 1;
                                const isTrue7 = column27ValueNumber <= 1;
                                const isTrue8 = column28ValueNumber <= 1;
                                const isTrue82 = column28ValueNumber <= 1;

                                //32memb
                                const isTrue100 = column2100ValueNumber <= 1;
                                const isTrue200 = column2200ValueNumber <= 1;
                                const isTrue300 = column2300ValueNumber <= 1;
                                const isTrue400 = column2400ValueNumber <= 1;
                                const isTrue500 = column2500ValueNumber <= 1;
                                const isTrue600 = column2600ValueNumber <= 1;
                                const isTrue700 = column2700ValueNumber <= 1;

                                //40
                                const isTrue10 = column210ValueNumber <= 1;
                                const isTrue20 = column220ValueNumber <= 1;
                                const isTrue30 = column230ValueNumber <= 1;
                                const isTrue40 = column240ValueNumber <= 1;
                                const isTrue50 = column250ValueNumber <= 1;
                                const isTrue60 = column260ValueNumber <= 1;
                                const isTrue70 = column270ValueNumber <= 1;
                                const isTrue80 = column280ValueNumber <= 1;

                                //40memb
                                const isTrue1011 = column21011ValueNumber <= 1;
                                const isTrue2011 = column22011ValueNumber <= 1;
                                const isTrue3011 = column23011ValueNumber <= 1;
                                const isTrue4011 = column24011ValueNumber <= 1;
                                const isTrue5011 = column25011ValueNumber <= 1;

                                const column13ValueParagraph = document.getElementById("column13Value");
                                const column14ValueParagraph = document.getElementById("column14Value");
                                const column15ValueParagraph = document.getElementById("column15Value");
                                const column16ValueParagraph = document.getElementById("column16Value");
                                const column17ValueParagraph = document.getElementById("column17Value");
                                const column18ValueParagraph = document.getElementById("column18Value");
                                const column19ValueParagraph = document.getElementById("column19Value");
                                const column20ValueParagraph = document.getElementById("column20Value");
                                const column202ValueParagraph = document.getElementById("column202Value");
                                const column21ValueParagraph = document.getElementById("column21Value");
                                const column22ValueParagraph = document.getElementById("column22Value");
                                const column23ValueParagraph = document.getElementById("column23Value");
                                const column24ValueParagraph = document.getElementById("column24Value");
                                const column25ValueParagraph = document.getElementById("column25Value");
                                const column26ValueParagraph = document.getElementById("column26Value");
                                const column27ValueParagraph = document.getElementById("column27Value");
                                const column28ValueParagraph = document.getElementById("column28Value");
                                const column282ValueParagraph = document.getElementById("column282Value");


                                //32memb
                                const column1300ValueParagraph = document.getElementById("column1300Value");
                                const column1400ValueParagraph = document.getElementById("column1400Value");
                                const column1500ValueParagraph = document.getElementById("column1500Value");
                                const column1600ValueParagraph = document.getElementById("column1600Value");
                                const column1700ValueParagraph = document.getElementById("column1700Value");
                                const column1800ValueParagraph = document.getElementById("column1800Value");
                                const column1900ValueParagraph = document.getElementById("column1900Value");
                                const column2100ValueParagraph = document.getElementById("column2100Value");
                                const column2200ValueParagraph = document.getElementById("column2200Value");
                                const column2300ValueParagraph = document.getElementById("column2300Value");
                                const column2400ValueParagraph = document.getElementById("column2400Value");
                                const column2500ValueParagraph = document.getElementById("column2500Value");
                                const column2600ValueParagraph = document.getElementById("column2600Value");
                                const column2700ValueParagraph = document.getElementById("column2700Value");

                                //40
                                const column130ValueParagraph = document.getElementById("column130Value");
                                const column140ValueParagraph = document.getElementById("column140Value");
                                const column150ValueParagraph = document.getElementById("column150Value");
                                const column160ValueParagraph = document.getElementById("column160Value");
                                const column170ValueParagraph = document.getElementById("column170Value");
                                const column180ValueParagraph = document.getElementById("column180Value");
                                const column190ValueParagraph = document.getElementById("column190Value");
                                const column200ValueParagraph = document.getElementById("column200Value");
                                const column210ValueParagraph = document.getElementById("column210Value");
                                const column220ValueParagraph = document.getElementById("column220Value");
                                const column230ValueParagraph = document.getElementById("column230Value");
                                const column240ValueParagraph = document.getElementById("column240Value");
                                const column250ValueParagraph = document.getElementById("column250Value");
                                const column260ValueParagraph = document.getElementById("column260Value");
                                const column270ValueParagraph = document.getElementById("column270Value");
                                const column280ValueParagraph = document.getElementById("column280Value");

                                //40memb
                                const column13011ValueParagraph = document.getElementById("column13011Value");
                                const column14011ValueParagraph = document.getElementById("column14011Value");
                                const column15011ValueParagraph = document.getElementById("column15011Value");
                                const column16011ValueParagraph = document.getElementById("column16011Value");
                                const column17011ValueParagraph = document.getElementById("column17011Value");
                                const column21011ValueParagraph = document.getElementById("column21011Value");
                                const column22011ValueParagraph = document.getElementById("column22011Value");
                                const column23011ValueParagraph = document.getElementById("column23011Value");
                                const column24011ValueParagraph = document.getElementById("column24011Value");
                                const column25011ValueParagraph = document.getElementById("column25011Value");

                                column13ValueParagraph.innerHTML = !isNaN(column13ValueNumber) ? column13ValueNumber : "";
                                column14ValueParagraph.innerHTML = !isNaN(column14ValueNumber) ? column14ValueNumber : "";
                                column15ValueParagraph.innerHTML = !isNaN(column15ValueNumber) ? column15ValueNumber : "";
                                column16ValueParagraph.innerHTML = !isNaN(column16ValueNumber) ? column16ValueNumber : "";
                                column17ValueParagraph.innerHTML = !isNaN(column17ValueNumber) ? column17ValueNumber : "";
                                column18ValueParagraph.innerHTML = !isNaN(column18ValueNumber) ? column18ValueNumber : "";
                                column19ValueParagraph.innerHTML = !isNaN(column19ValueNumber) ? column19ValueNumber : "";
                                column20ValueParagraph.innerHTML = !isNaN(column20ValueNumber) ? column20ValueNumber : "";
                                column202ValueParagraph.innerHTML = !isNaN(column202ValueNumber) ? column202ValueNumber : "";
                                column21ValueParagraph.innerHTML = !isNaN(column21ValueNumber) ? column21ValueNumber : "";
                                column22ValueParagraph.innerHTML = !isNaN(column22ValueNumber) ? column22ValueNumber : "";
                                column23ValueParagraph.innerHTML = !isNaN(column23ValueNumber) ? column23ValueNumber : "";
                                column24ValueParagraph.innerHTML = !isNaN(column24ValueNumber) ? column24ValueNumber : "";
                                column25ValueParagraph.innerHTML = !isNaN(column25ValueNumber) ? column25ValueNumber : "";
                                column26ValueParagraph.innerHTML = !isNaN(column26ValueNumber) ? column26ValueNumber : "";
                                column27ValueParagraph.innerHTML = !isNaN(column27ValueNumber) ? column27ValueNumber : "";
                                column28ValueParagraph.innerHTML = !isNaN(column28ValueNumber) ? column28ValueNumber : "";
                                column282ValueParagraph.innerHTML = !isNaN(column282ValueNumber) ? column282ValueNumber : "";

                                //32memb
                                column1300ValueParagraph.innerHTML = !isNaN(column1300ValueNumber) ? column1300ValueNumber : "";
                                column1400ValueParagraph.innerHTML = !isNaN(column1400ValueNumber) ? column1400ValueNumber : "";
                                column1500ValueParagraph.innerHTML = !isNaN(column1500ValueNumber) ? column1500ValueNumber : "";
                                column1600ValueParagraph.innerHTML = !isNaN(column1600ValueNumber) ? column1600ValueNumber : "";
                                column1700ValueParagraph.innerHTML = !isNaN(column1700ValueNumber) ? column1700ValueNumber : "";
                                column1800ValueParagraph.innerHTML = !isNaN(column1800ValueNumber) ? column1800ValueNumber : "";
                                column1900ValueParagraph.innerHTML = !isNaN(column1900ValueNumber) ? column1900ValueNumber : "";
                                column2100ValueParagraph.innerHTML = !isNaN(column2100ValueNumber) ? column2100ValueNumber : "";
                                column2200ValueParagraph.innerHTML = !isNaN(column2200ValueNumber) ? column2200ValueNumber : "";
                                column2300ValueParagraph.innerHTML = !isNaN(column2300ValueNumber) ? column2300ValueNumber : "";
                                column2400ValueParagraph.innerHTML = !isNaN(column2400ValueNumber) ? column2400ValueNumber : "";
                                column2500ValueParagraph.innerHTML = !isNaN(column2500ValueNumber) ? column2500ValueNumber : "";
                                column2600ValueParagraph.innerHTML = !isNaN(column2600ValueNumber) ? column2600ValueNumber : "";
                                column2700ValueParagraph.innerHTML = !isNaN(column2700ValueNumber) ? column2700ValueNumber : "";

                                //40
                                column130ValueParagraph.innerHTML = !isNaN(column130ValueNumber) ? column130ValueNumber : "";
                                column140ValueParagraph.innerHTML = !isNaN(column140ValueNumber) ? column140ValueNumber : "";
                                column150ValueParagraph.innerHTML = !isNaN(column150ValueNumber) ? column150ValueNumber : "";
                                column160ValueParagraph.innerHTML = !isNaN(column160ValueNumber) ? column160ValueNumber : "";
                                column170ValueParagraph.innerHTML = !isNaN(column170ValueNumber) ? column170ValueNumber : "";
                                column180ValueParagraph.innerHTML = !isNaN(column180ValueNumber) ? column180ValueNumber : "";
                                column190ValueParagraph.innerHTML = !isNaN(column190ValueNumber) ? column190ValueNumber : "";
                                column200ValueParagraph.innerHTML = !isNaN(column200ValueNumber) ? column200ValueNumber : "";
                                column210ValueParagraph.innerHTML = !isNaN(column210ValueNumber) ? column210ValueNumber : "";
                                column220ValueParagraph.innerHTML = !isNaN(column220ValueNumber) ? column220ValueNumber : "";
                                column230ValueParagraph.innerHTML = !isNaN(column230ValueNumber) ? column230ValueNumber : "";
                                column240ValueParagraph.innerHTML = !isNaN(column240ValueNumber) ? column240ValueNumber : "";
                                column250ValueParagraph.innerHTML = !isNaN(column250ValueNumber) ? column250ValueNumber : "";
                                column260ValueParagraph.innerHTML = !isNaN(column260ValueNumber) ? column260ValueNumber : "";
                                column270ValueParagraph.innerHTML = !isNaN(column270ValueNumber) ? column270ValueNumber : "";
                                column280ValueParagraph.innerHTML = !isNaN(column280ValueNumber) ? column280ValueNumber : "";

                                //40memb
                                column13011ValueParagraph.innerHTML = !isNaN(column13011ValueNumber) ? column13011ValueNumber : "";
                                column14011ValueParagraph.innerHTML = !isNaN(column14011ValueNumber) ? column14011ValueNumber : "";
                                column15011ValueParagraph.innerHTML = !isNaN(column15011ValueNumber) ? column15011ValueNumber : "";
                                column16011ValueParagraph.innerHTML = !isNaN(column16011ValueNumber) ? column16011ValueNumber : "";
                                column17011ValueParagraph.innerHTML = !isNaN(column17011ValueNumber) ? column17011ValueNumber : "";
                                column21011ValueParagraph.innerHTML = !isNaN(column21011ValueNumber) ? column21011ValueNumber : "";
                                column22011ValueParagraph.innerHTML = !isNaN(column22011ValueNumber) ? column22011ValueNumber : "";
                                column23011ValueParagraph.innerHTML = !isNaN(column23011ValueNumber) ? column23011ValueNumber : "";
                                column24011ValueParagraph.innerHTML = !isNaN(column24011ValueNumber) ? column24011ValueNumber : "";
                                column25011ValueParagraph.innerHTML = !isNaN(column25011ValueNumber) ? column25011ValueNumber : "";

                                columnValue1Output.innerHTML = isTrue1 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';
                                columnValue2Output.innerHTML = isTrue2 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';
                                columnValue3Output.innerHTML = isTrue3 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';
                                columnValue4Output.innerHTML = isTrue4 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';
                                columnValue5Output.innerHTML = isTrue5 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';
                                columnValue6Output.innerHTML = isTrue6 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';
                                columnValue7Output.innerHTML = isTrue7 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';
                                columnValue8Output.innerHTML = isTrue8 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';
                                columnValue82Output.innerHTML = isTrue8 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';

                                //32memb
                                columnValue100Output.innerHTML = isTrue100 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';
                                columnValue200Output.innerHTML = isTrue200 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';
                                columnValue300Output.innerHTML = isTrue300 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';
                                columnValue400Output.innerHTML = isTrue400 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';
                                columnValue500Output.innerHTML = isTrue500 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';
                                columnValue600Output.innerHTML = isTrue600 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';
                                columnValue700Output.innerHTML = isTrue700 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';

                                //40
                                columnValue10Output.innerHTML = isTrue10 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';
                                columnValue20Output.innerHTML = isTrue20 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';
                                columnValue30Output.innerHTML = isTrue30 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';
                                columnValue40Output.innerHTML = isTrue40 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';
                                columnValue50Output.innerHTML = isTrue50 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';
                                columnValue60Output.innerHTML = isTrue60 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';
                                columnValue70Output.innerHTML = isTrue70 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';
                                columnValue80Output.innerHTML = isTrue80 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';


                                //40memb
                                columnValue1011Output.innerHTML = isTrue1011 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';
                                columnValue2011Output.innerHTML = isTrue2011 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';
                                columnValue3011Output.innerHTML = isTrue3011 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';
                                columnValue4011Output.innerHTML = isTrue4011 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';
                                columnValue5011Output.innerHTML = isTrue5011 ? '| <i class="fas fa-check-circle" style="color: green;"></i>' : '| <i class="fas fa-times-circle" style="color: red;"></i>';
                                }
                                </script>

                                <div class="panel h-full">
                                    <div class="mb-5 flex items-center">
                                        <h5 class="text-md font-semibold dark:text-white-light">Points to be considered while quoting to customers </h5>
                                    </div>
                                    <div class="overflow-hidden" style="Overflow-y:scroll; height: 850px;">
                                        <b>1.</b> Cloth based on microns ( write one set and mention microns in the quote so work order cloth selection is easier)<br><br>

                                        <b>2.</b> Pump selection shall be 5-6 times the chamber volume . For example 500 liters is chamber volume then 500*6= 300 so 3 m3/hr pump shall be  suggested, progressive screw pump can be given or it should be selected based on filtration volume required by customer<br><br> 

                                        <b>3.</b> If its food or phram or solvent , explosive quote FLP motor for hydraulic and pump motor and mention only motor FLP and other hydraulics should be kept outside . <br><br>

                                        <b>4.</b> If Ph is acidic , choose FRP lining / SS nozzle in Launder and all contact areas<br><br>

                                        <b>5.</b> For export projects consider DA hydraulics while submitting quote<br><br>

                                        <b>6.</b> Specific gravity /density above 3 , consider top feed <br><br>

                                        <b>7.</b> For high temeprature above 60 degree consider high temeprature plates<br><br>

                                        <b>8.</b> For abrasive slurry take advise of pump selection for stator and for sand slurry select centrifugal rubber lined pump<br><br>

                                        <b>9.</b> For zero lekage conditions , choose CGR plates<br><br>

                                        <b>10.</b> Cake washing consider 4 corner type plates<br><br>

                                        <b>11.</b> Agitator to be provided for sand , cement , battery paste , hard powder form <br><br>

                                    </div>
                                </div>
                            </div>

                            <div class="mb-6 grid gap-6 sm:grid-cols-2 xl:grid-cols-2">
                                <div class="panel h-full sm:col-span-2 xl:col-span-1">
                                    <div class="mb-5 flex items-center">
                                        <h5 class="text-md font-bold"></h5>
                                    </div>
                                    <div class="overflow-hidden">
                                        <div class="table-responsive">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th style="color:orange">Calculation using by volume For 32mm</th>
                                                        <th>No.of Machines</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <tr>
                                                            <td>If 470 * 470 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column13Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column21Value"></span></td>
                                                            <td><span id="columnValue1Output"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>If 610 * 610 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column14Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column22Value"></span></td>
                                                            <td><span id="columnValue2Output"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>If 800 * 800 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column15Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column23Value"></span></td>
                                                            <td><span id="columnValue3Output"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>If 915 * 915 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column16Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column24Value"></span></td>
                                                            <td><span id="columnValue4Output"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>If 1000 * 1000 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column17Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column25Value"></span></td>
                                                            <td><span id="columnValue5Output"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>If 1100 * 1100 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column18Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column26Value"></span></td>
                                                            <td><span id="columnValue6Output"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>If 1200 * 1200 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column19Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column27Value"></span></td>
                                                            <td><span id="columnValue7Output"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>If 1300 * 1300 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column20Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column28Value"></span></td>
                                                            <td><span id="columnValue8Output"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>If 1500 * 1500 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column202Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column282Value"></span></td>
                                                            <td><span id="columnValue82Output"></span></td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>

                                <div class="panel h-full">
                                    <div class="mb-5 flex items-center dark:text-white-light">
                                        <h5 class="text-md font-bold"></h5>
                                    </div>
                                    <div class="overflow-hidden">
                                        <div class="table-responsive">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th style="color:orange">Calculation using by volume For 40mm</th>
                                                        <th>No.of Machines</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <tr>
                                                            <td>If 610 * 610 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column130Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column210Value"></span></td>
                                                            <td><span id="columnValue10Output"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>If 800 * 800 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column140Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column220Value"></span></td>
                                                            <td><span id="columnValue20Output"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>If 915 * 915 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column150Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column230Value"></span></td>
                                                            <td><span id="columnValue30Output"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>If 1000 * 1000 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column160Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column240Value"></span></td>
                                                            <td><span id="columnValue40Output"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>If 1100 * 1100 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column170Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column250Value"></span></td>
                                                            <td><span id="columnValue50Output"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>If 1200 * 1200 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column180Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column260Value"></span></td>
                                                            <td><span id="columnValue60Output"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>If 1300 * 1300 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column190Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column270Value"></span></td>
                                                            <td><span id="columnValue70Output"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>If 1500 * 1500 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column200Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column280Value"></span></td>
                                                            <td><span id="columnValue80Output"></span></td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-6 grid gap-6 sm:grid-cols-2 xl:grid-cols-2">
                                <div class="panel h-full sm:col-span-2 xl:col-span-1">
                                    <div class="mb-5 flex items-center">
                                        <h5 class="text-md font-bold"></h5>
                                    </div>
                                    <div class="overflow-hidden">
                                        <div class="table-responsive">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th style="color:orange">Calculation using by Membrane For 32mm</th>
                                                        <th>No.of Machines</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <tr>
                                                            <td>If 630 * 630 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column1300Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column2100Value"></span></td>
                                                            <td><span id="columnValue100Output"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>If 800 * 800 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column1400Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column2200Value"></span></td>
                                                            <td><span id="columnValue200Output"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>If 1000 * 1000 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column1500Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column2300Value"></span></td>
                                                            <td><span id="columnValue300Output"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>If 1200 * 1200 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column1600Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column2400Value"></span></td>
                                                            <td><span id="columnValue400Output"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>If 1250 * 1250 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column1700Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column2500Value"></span></td>
                                                            <td><span id="columnValue500Output"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>If 1500 * 1500 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column1800Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column2600Value"></span></td>
                                                            <td><span id="columnValue600Output"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>If 2000 * 2000 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column1900Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column2700Value"></span></td>
                                                            <td><span id="columnValue700Output"></span></td>
                                                        </tr>
                                                        
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>

                                <div class="panel h-full">
                                    <div class="mb-5 flex items-center dark:text-white-light">
                                        <h5 class="text-md font-bold"></h5>
                                    </div>
                                    <div class="overflow-hidden">
                                        <div class="table-responsive">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th style="color:orange">Calculation using by Membrane For 40mm</th>
                                                        <th>No.of Machines</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <tr>
                                                            <td>If 1000 * 1000 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column13011Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column21011Value"></span></td>
                                                            <td><span id="columnValue1011Output"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>If 1200 * 1200 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column14011Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column22011Value"></span></td>
                                                            <td><span id="columnValue2011Output"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>If 1250 * 1250 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column15011Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column23011Value"></span></td>
                                                            <td><span id="columnValue3011Output"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>If 1500 * 1500 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column16011Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column24011Value"></span></td>
                                                            <td><span id="columnValue4011Output"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>If 2000 * 2000 mm number of plates requried is <span style="color:green;" class="text-md font-bold" id="column17011Value"></span></td>
                                                            <td><span style="color:blue;" class="text-lg font-bold" id="column25011Value"></span></td>
                                                            <td><span id="columnValue5011Output"></span></td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end main content section -->
                </div>

                <!-- start footer section -->
                <div class="mt-auto p-6 pt-0 text-center dark:text-white-dark ltr:sm:text-left rtl:sm:text-right">
                    © <span id="footer-year">2023</span>. All rights reserved.
                </div>
                <!-- end footer section -->
            </div>
        </div>

        <script src="assets/js/alpine-collaspe.min.js"></script>
        <script src="assets/js/alpine-persist.min.js"></script>
        <script defer src="assets/js/alpine-ui.min.js"></script>
        <script defer src="assets/js/alpine-focus.min.js"></script>
        <script defer src="assets/js/alpine.min.js"></script>
        <script src="assets/js/custom.js"></script>
        <script defer src="assets/js/apexcharts.js"></script>

        <script>
            document.addEventListener('alpine:init', () => {
                // main section
                Alpine.data('scrollToTop', () => ({
                    showTopButton: false,
                    init() {
                        window.onscroll = () => {
                            this.scrollFunction();
                        };
                    },

                    scrollFunction() {
                        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                            this.showTopButton = true;
                        } else {
                            this.showTopButton = false;
                        }
                    },

                    goToTop() {
                        document.body.scrollTop = 0;
                        document.documentElement.scrollTop = 0;
                    },
                }));

                // theme customization
                Alpine.data('customizer', () => ({
                    showCustomizer: false,
                }));

                // sidebar section
                Alpine.data('sidebar', () => ({
                    init() {
                        const selector = document.querySelector('.sidebar ul a[href="' + window.location.pathname + '"]');
                        if (selector) {
                            selector.classList.add('active');
                            const ul = selector.closest('ul.sub-menu');
                            if (ul) {
                                let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                                if (ele) {
                                    ele = ele[0];
                                    setTimeout(() => {
                                        ele.click();
                                    });
                                }
                            }
                        }
                    },
                }));

                // header section
                Alpine.data('header', () => ({
                    init() {
                        const selector = document.querySelector('ul.horizontal-menu a[href="' + window.location.pathname + '"]');
                        if (selector) {
                            selector.classList.add('active');
                            const ul = selector.closest('ul.sub-menu');
                            if (ul) {
                                let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                                if (ele) {
                                    ele = ele[0];
                                    setTimeout(() => {
                                        ele.classList.add('active');
                                    });
                                }
                            }
                        }
                    },

                    notifications: [
                        {
                            id: 1,
                            profile: 'user-profile.jpeg',
                            message: '<strong class="text-sm mr-1">John Doe</strong>invite you to <strong>Prototyping</strong>',
                            time: '45 min ago',
                        },
                        {
                            id: 2,
                            profile: 'profile-34.jpeg',
                            message: '<strong class="text-sm mr-1">Adam Nolan</strong>mentioned you to <strong>UX Basics</strong>',
                            time: '9h Ago',
                        },
                        {
                            id: 3,
                            profile: 'profile-16.jpeg',
                            message: '<strong class="text-sm mr-1">Anna Morgan</strong>Upload a file',
                            time: '9h Ago',
                        },
                    ],

                    messages: [
                        {
                            id: 1,
                            image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-success-light dark:bg-success text-success dark:text-success-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg></span>',
                            title: 'Congratulations!',
                            message: 'Your OS has been updated.',
                            time: '1hr',
                        },
                        {
                            id: 2,
                            image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-info-light dark:bg-info text-info dark:text-info-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></span>',
                            title: 'Did you know?',
                            message: 'You can switch between artboards.',
                            time: '2hr',
                        },
                        {
                            id: 3,
                            image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-danger-light dark:bg-danger text-danger dark:text-danger-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>',
                            title: 'Something went wrong!',
                            message: 'Send Reposrt',
                            time: '2days',
                        },
                        {
                            id: 4,
                            image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-warning-light dark:bg-warning text-warning dark:text-warning-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">    <circle cx="12" cy="12" r="10"></circle>    <line x1="12" y1="8" x2="12" y2="12"></line>    <line x1="12" y1="16" x2="12.01" y2="16"></line></svg></span>',
                            title: 'Warning',
                            message: 'Your password strength is low.',
                            time: '5days',
                        },
                    ],

                    languages: [
                        {
                            id: 1,
                            key: 'Chinese',
                            value: 'zh',
                        },
                        {
                            id: 2,
                            key: 'Danish',
                            value: 'da',
                        },
                        {
                            id: 3,
                            key: 'English',
                            value: 'en',
                        },
                        {
                            id: 4,
                            key: 'French',
                            value: 'fr',
                        },
                        {
                            id: 5,
                            key: 'German',
                            value: 'de',
                        },
                        {
                            id: 6,
                            key: 'Greek',
                            value: 'el',
                        },
                        {
                            id: 7,
                            key: 'Hungarian',
                            value: 'hu',
                        },
                        {
                            id: 8,
                            key: 'Italian',
                            value: 'it',
                        },
                        {
                            id: 9,
                            key: 'Japanese',
                            value: 'ja',
                        },
                        {
                            id: 10,
                            key: 'Polish',
                            value: 'pl',
                        },
                        {
                            id: 11,
                            key: 'Portuguese',
                            value: 'pt',
                        },
                        {
                            id: 12,
                            key: 'Russian',
                            value: 'ru',
                        },
                        {
                            id: 13,
                            key: 'Spanish',
                            value: 'es',
                        },
                        {
                            id: 14,
                            key: 'Swedish',
                            value: 'sv',
                        },
                        {
                            id: 15,
                            key: 'Turkish',
                            value: 'tr',
                        },
                        {
                            id: 16,
                            key: 'Arabic',
                            value: 'ae',
                        },
                    ],

                    removeNotification(value) {
                        this.notifications = this.notifications.filter((d) => d.id !== value);
                    },

                    removeMessage(value) {
                        this.messages = this.messages.filter((d) => d.id !== value);
                    },
                }));

                // content section
                Alpine.data('sales', () => ({
                    init() {
                        isDark = this.$store.app.theme === 'dark' || this.$store.app.isDarkMode ? true : false;
                        isRtl = this.$store.app.rtlClass === 'rtl' ? true : false;

                        const revenueChart = null;
                        const salesByCategory = null;
                        const dailySales = null;
                        const totalOrders = null;

                        // revenue
                        setTimeout(() => {
                            this.revenueChart = new ApexCharts(this.$refs.revenueChart, this.revenueChartOptions);
                            this.$refs.revenueChart.innerHTML = '';
                            this.revenueChart.render();

                            // sales by category
                            this.salesByCategory = new ApexCharts(this.$refs.salesByCategory, this.salesByCategoryOptions);
                            this.$refs.salesByCategory.innerHTML = '';
                            this.salesByCategory.render();

                            // daily sales
                            this.dailySales = new ApexCharts(this.$refs.dailySales, this.dailySalesOptions);
                            this.$refs.dailySales.innerHTML = '';
                            this.dailySales.render();

                            // total orders
                            this.totalOrders = new ApexCharts(this.$refs.totalOrders, this.totalOrdersOptions);
                            this.$refs.totalOrders.innerHTML = '';
                            this.totalOrders.render();
                        }, 300);

                        this.$watch('$store.app.theme', () => {
                            isDark = this.$store.app.theme === 'dark' || this.$store.app.isDarkMode ? true : false;

                            this.revenueChart.updateOptions(this.revenueChartOptions);
                            this.salesByCategory.updateOptions(this.salesByCategoryOptions);
                            this.dailySales.updateOptions(this.dailySalesOptions);
                            this.totalOrders.updateOptions(this.totalOrdersOptions);
                        });

                        this.$watch('$store.app.rtlClass', () => {
                            isRtl = this.$store.app.rtlClass === 'rtl' ? true : false;
                            this.revenueChart.updateOptions(this.revenueChartOptions);
                        });
                    },

                    // revenue
                    get revenueChartOptions() {
                        return {
                            series: [
                                {
                                    name: 'Income',
                                    data: [16800, 16800, 15500, 17800, 15500, 17000, 19000, 16000, 15000, 17000, 14000, 17000],
                                },
                                {
                                    name: 'Expenses',
                                    data: [16500, 17500, 16200, 17300, 16000, 19500, 16000, 17000, 16000, 19000, 18000, 19000],
                                },
                            ],
                            chart: {
                                height: 325,
                                type: 'area',
                                fontFamily: 'Nunito, sans-serif',
                                zoom: {
                                    enabled: false,
                                },
                                toolbar: {
                                    show: false,
                                },
                            },
                            dataLabels: {
                                enabled: false,
                            },
                            stroke: {
                                show: true,
                                curve: 'smooth',
                                width: 2,
                                lineCap: 'square',
                            },
                            dropShadow: {
                                enabled: true,
                                opacity: 0.2,
                                blur: 10,
                                left: -7,
                                top: 22,
                            },
                            colors: isDark ? ['#2196f3', '#e7515a'] : ['#1b55e2', '#e7515a'],
                            markers: {
                                discrete: [
                                    {
                                        seriesIndex: 0,
                                        dataPointIndex: 6,
                                        fillColor: '#1b55e2',
                                        strokeColor: 'transparent',
                                        size: 7,
                                    },
                                    {
                                        seriesIndex: 1,
                                        dataPointIndex: 5,
                                        fillColor: '#e7515a',
                                        strokeColor: 'transparent',
                                        size: 7,
                                    },
                                ],
                            },
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                            xaxis: {
                                axisBorder: {
                                    show: false,
                                },
                                axisTicks: {
                                    show: false,
                                },
                                crosshairs: {
                                    show: true,
                                },
                                labels: {
                                    offsetX: isRtl ? 2 : 0,
                                    offsetY: 5,
                                    style: {
                                        fontSize: '12px',
                                        cssClass: 'apexcharts-xaxis-title',
                                    },
                                },
                            },
                            yaxis: {
                                tickAmount: 7,
                                labels: {
                                    formatter: (value) => {
                                        return value / 1000 + 'K';
                                    },
                                    offsetX: isRtl ? -30 : -10,
                                    offsetY: 0,
                                    style: {
                                        fontSize: '12px',
                                        cssClass: 'apexcharts-yaxis-title',
                                    },
                                },
                                opposite: isRtl ? true : false,
                            },
                            grid: {
                                borderColor: isDark ? '#191e3a' : '#e0e6ed',
                                strokeDashArray: 5,
                                xaxis: {
                                    lines: {
                                        show: true,
                                    },
                                },
                                yaxis: {
                                    lines: {
                                        show: false,
                                    },
                                },
                                padding: {
                                    top: 0,
                                    right: 0,
                                    bottom: 0,
                                    left: 0,
                                },
                            },
                            legend: {
                                position: 'top',
                                horizontalAlign: 'right',
                                fontSize: '16px',
                                markers: {
                                    width: 10,
                                    height: 10,
                                    offsetX: -2,
                                },
                                itemMargin: {
                                    horizontal: 10,
                                    vertical: 5,
                                },
                            },
                            tooltip: {
                                marker: {
                                    show: true,
                                },
                                x: {
                                    show: false,
                                },
                            },
                            fill: {
                                type: 'gradient',
                                gradient: {
                                    shadeIntensity: 1,
                                    inverseColors: !1,
                                    opacityFrom: isDark ? 0.19 : 0.28,
                                    opacityTo: 0.05,
                                    stops: isDark ? [100, 100] : [45, 100],
                                },
                            },
                        };
                    },

                    // sales by category
                    get salesByCategoryOptions() {
                        return {
                            series: [985, 737, 270],
                            chart: {
                                type: 'donut',
                                height: 460,
                                fontFamily: 'Nunito, sans-serif',
                            },
                            dataLabels: {
                                enabled: false,
                            },
                            stroke: {
                                show: true,
                                width: 25,
                                colors: isDark ? '#0e1726' : '#fff',
                            },
                            colors: isDark ? ['#5c1ac3', '#e2a03f', '#e7515a', '#e2a03f'] : ['#e2a03f', '#5c1ac3', '#e7515a'],
                            legend: {
                                position: 'bottom',
                                horizontalAlign: 'center',
                                fontSize: '14px',
                                markers: {
                                    width: 10,
                                    height: 10,
                                    offsetX: -2,
                                },
                                height: 50,
                                offsetY: 20,
                            },
                            plotOptions: {
                                pie: {
                                    donut: {
                                        size: '65%',
                                        background: 'transparent',
                                        labels: {
                                            show: true,
                                            name: {
                                                show: true,
                                                fontSize: '29px',
                                                offsetY: -10,
                                            },
                                            value: {
                                                show: true,
                                                fontSize: '26px',
                                                color: isDark ? '#bfc9d4' : undefined,
                                                offsetY: 16,
                                                formatter: (val) => {
                                                    return val;
                                                },
                                            },
                                            total: {
                                                show: true,
                                                label: 'Total',
                                                color: '#888ea8',
                                                fontSize: '29px',
                                                formatter: (w) => {
                                                    return w.globals.seriesTotals.reduce(function (a, b) {
                                                        return a + b;
                                                    }, 0);
                                                },
                                            },
                                        },
                                    },
                                },
                            },
                            labels: ['Apparel', 'Sports', 'Others'],
                            states: {
                                hover: {
                                    filter: {
                                        type: 'none',
                                        value: 0.15,
                                    },
                                },
                                active: {
                                    filter: {
                                        type: 'none',
                                        value: 0.15,
                                    },
                                },
                            },
                        };
                    },

                    // daily sales
                    get dailySalesOptions() {
                        return {
                            series: [
                                {
                                    name: 'Sales',
                                    data: [44, 55, 41, 67, 22, 43, 21],
                                },
                                {
                                    name: 'Last Week',
                                    data: [13, 23, 20, 8, 13, 27, 33],
                                },
                            ],
                            chart: {
                                height: 160,
                                type: 'bar',
                                fontFamily: 'Nunito, sans-serif',
                                toolbar: {
                                    show: false,
                                },
                                stacked: true,
                                stackType: '100%',
                            },
                            dataLabels: {
                                enabled: false,
                            },
                            stroke: {
                                show: true,
                                width: 1,
                            },
                            colors: ['#e2a03f', '#e0e6ed'],
                            responsive: [
                                {
                                    breakpoint: 480,
                                    options: {
                                        legend: {
                                            position: 'bottom',
                                            offsetX: -10,
                                            offsetY: 0,
                                        },
                                    },
                                },
                            ],
                            xaxis: {
                                labels: {
                                    show: false,
                                },
                                categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat'],
                            },
                            yaxis: {
                                show: false,
                            },
                            fill: {
                                opacity: 1,
                            },
                            plotOptions: {
                                bar: {
                                    horizontal: false,
                                    columnWidth: '25%',
                                },
                            },
                            legend: {
                                show: false,
                            },
                            grid: {
                                show: false,
                                xaxis: {
                                    lines: {
                                        show: false,
                                    },
                                },
                                padding: {
                                    top: 10,
                                    right: -20,
                                    bottom: -20,
                                    left: -20,
                                },
                            },
                        };
                    },

                    // total orders
                    get totalOrdersOptions() {
                        return {
                            series: [
                                {
                                    name: 'Sales',
                                    data: [28, 40, 36, 52, 38, 60, 38, 52, 36, 40],
                                },
                            ],
                            chart: {
                                height: 290,
                                type: 'area',
                                fontFamily: 'Nunito, sans-serif',
                                sparkline: {
                                    enabled: true,
                                },
                            },
                            stroke: {
                                curve: 'smooth',
                                width: 2,
                            },
                            colors: isDark ? ['#00ab55'] : ['#00ab55'],
                            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
                            yaxis: {
                                min: 0,
                                show: false,
                            },
                            grid: {
                                padding: {
                                    top: 125,
                                    right: 0,
                                    bottom: 0,
                                    left: 0,
                                },
                            },
                            fill: {
                                opacity: 1,
                                type: 'gradient',
                                gradient: {
                                    type: 'vertical',
                                    shadeIntensity: 1,
                                    inverseColors: !1,
                                    opacityFrom: 0.3,
                                    opacityTo: 0.05,
                                    stops: [100, 100],
                                },
                            },
                            tooltip: {
                                x: {
                                    show: false,
                                },
                            },
                        };
                    },
                }));
            });
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    </body>
</html>

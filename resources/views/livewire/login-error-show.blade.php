<div>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.4/dist/tailwind.min.css" rel="stylesheet" />

    <style>
        .shadow-offset-blue {
            box-shadow: 4px 4px 1px rgb(37, 99, 235);
        }

        /* blue-600 */
        .shadow-offset-black {
            box-shadow: 4px 4px 1px rgb(0, 0, 0);
        }

        @keyframes draw {
            from {
                stroke-dashoffset: 1000;
            }

            to {
                stroke-dashoffset: 0;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .svg-draw {
                animation: none !important;
            }
        }
    </style>

    <div class="relative" role="alert" aria-live="polite">
        <div class="bg-white rounded-lg p-6 sm:p-2 transition-transform duration-200 hover:-translate-y-0.5">
            <!-- SVG first, text second -->
            <div class="grid gap-6">
                <!-- Animated SVG lock -->
                <svg viewBox="0 0 64 64" class="h-20 w-20 text-blue-600 flex-shrink-0" fill="none" aria-hidden="true">
                    <rect x="12" y="26" width="40" height="28" rx="6" class="svg-draw"
                        style="stroke-dasharray: 300; animation: draw 1.2s ease-in-out forwards" stroke="currentColor"
                        stroke-width="3" />
                    <path d="M22 26v-4a10 10 0 0 1 20 0v4" class="svg-draw"
                        style="stroke-dasharray: 200; animation: draw 1.2s ease-in-out 0.15s forwards"
                        stroke="currentColor" stroke-width="3" stroke-linecap="round" />
                    <circle cx="32" cy="40" r="3" class="svg-draw"
                        style="stroke-dasharray: 60; animation: draw 0.9s ease-in-out 0.3s forwards"
                        stroke="currentColor" stroke-width="3" />
                </svg>

                <!-- Text second -->
                <div>
                    <h3 class="text-3xl font-semibold text-gray-900 mb-1">Authentication required</h3>
                    <p class="text-gray-800 mt-3">
                        Please log in to continue using services and personalized features. Security: Authentication
                        prevents unauthorized access to sensitive actions and data; adding MFA greatly reduces risks
                        from stolen or weak passwords.
                    </p>
                </div>
            </div>

        </div>
    </div>

</div>

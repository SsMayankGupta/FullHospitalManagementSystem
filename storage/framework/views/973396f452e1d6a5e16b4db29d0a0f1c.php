<div>
    <div class="p-3 text-3xl text-black">New Appointment Registration</div>

    <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $patientNewData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="mt-6 mx-auto p-4">
            <form wire:submit.prevent="submit" wire:key="<?php echo e($loop->index); ?>number">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="grid grid-rows grid-2 gap-2">
                        <label class="text-gray-700 font-semibold">Patient ID</label>
                        <button type="button" class="border rounded px-3 py-2" wire:model="patient_id"
                            value="<?php echo e($item->patient_id); ?>"><?php echo e($item->patient_id); ?></button>
                    </div>
                    <div class="grid grid-rows grid-2 gap-2">
                        <label class="text-gray-700 font-semibold">Name</label>
                        <div class="border rounded px-3 py-2"><?php echo e($item->patient_name); ?></div>
                    </div>
                    <div class="grid grid-rows grid-2 gap-2">
                        <label class="text-gray-700 font-semibold">Email</label>
                        <div class="border rounded px-3 py-2"><?php echo e($item->patient_email); ?></div>
                    </div>
                    <div class="grid grid-rows grid-2 gap-2">
                        <label class="text-gray-700 font-semibold">Phone</label>
                        <div class="border rounded px-3 py-2"><?php echo e($item->patient_phone); ?></div>
                    </div>
                    <div class="grid grid-rows grid-2 gap-2">
                        <label class="text-gray-700 font-semibold">Address</label>
                        <div class="border rounded px-3 py-2"><?php echo e($item->patient_address); ?></div>
                    </div>
                    <div class="grid grid-rows grid-2 gap-2">
                        <label class="text-gray-700 font-semibold">Appointment Time</label>
                        <div class="border rounded px-3 py-2"><?php echo e($item->patient_appointment_time); ?></div>
                    </div>
                    <div class="grid grid-rows grid-2 gap-2">
                        <label class="text-gray-700 font-semibold">Appointment Date</label>
                        <div class="border rounded px-3 py-2"><?php echo e($item->patient_appointment_date); ?></div>
                    </div>
                    <div class="grid grid-rows grid-2 gap-2">
                        <label class="text-gray-700 font-semibold">Preferred Contact</label>
                        <div class="border rounded px-3 py-2"><?php echo e($item->patient_prefered_contact); ?></div>
                    </div>
                    <div class="md:col-span-3 grid grid-rows grid-2 gap-2">
                        <label class="text-gray-700 font-semibold">Problem Statement</label>
                        <div class="border rounded px-3 py-2"><?php echo e($item->patient_problem_statement); ?></div>
                    </div>
                    <div class="md:col-span-3 grid grid-rows grid-2 gap-2">
                        <label class="text-gray-700 font-semibold">Extra Info</label>
                        <div class="border rounded px-3 py-2">
                            <?php echo e($item->patient_extra_info ?? 'N/A'); ?>

                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="grid grid-rows grid-2 gap-2">
                        <label for="doctor_id" class="text-gray-700 font-semibold">Select Doctor</label>
                        <select wire:model="doctor_id" id="doctor_id" class="border rounded px-3 py-2 w-full">
                            <option value="">Choose Doctor</option>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $doctorsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($doctor['dr_id']); ?>"><?php echo e($doctor['dr_name']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </select>
                    </div>
                    <div class="md:col-span-3 grid grid-rows grid-2 gap-2">
                        <label for="message" class="text-gray-700 font-semibold">Appointment Message</label>
                        <textarea wire:model.defer="message" id="message" rows="2" class="border rounded px-3 py-2 w-full"
                            placeholder="Enter details for your doctor appointment..."></textarea>
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="p-3 text-sm text-red-500"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" wire:key="<?php echo e($loop->index); ?>number"
                        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                        Submit Appointment
                    </button>

                    <div class="p-2 text-red-400" wire:loading wire:target="submit"
                        wire:key="<?php echo e($loop->index); ?>number">Please wait ....</div>
                </div>

            </form>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="text-lg p-3">No data founded.....</div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!--[if BLOCK]><![endif]--><?php if($patientNewData != null): ?>
        <div>
            <button wire:click="getMoreResults"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
                More results
            </button>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH D:\healthclient\client1.1\resources\views/livewire/patient-handling/new-appointments.blade.php ENDPATH**/ ?>
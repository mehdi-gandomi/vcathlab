<vx-card ref="filterCard" title="Filters" class="user-list-filters mb-8" actionButtons @refresh="resetColFilters" @remove="resetColFilters">
    <div class="vx-row">
      <div class="vx-col md:w-1/4 sm:w-1/2 w-full">
        <label class="text-sm opacity-75">Role</label>
        <v-select :options="roleOptions" :clearable="false" :dir="$vs.rtl ? 'rtl' : 'ltr'" v-model="roleFilter" class="mb-4 md:mb-0" />
      </div>
      <div class="vx-col md:w-1/4 sm:w-1/2 w-full">
        <label class="text-sm opacity-75">Status</label>
        <v-select :options="statusOptions" :clearable="false" :dir="$vs.rtl ? 'rtl' : 'ltr'" v-model="statusFilter" class="mb-4 md:mb-0" />
      </div>
      <div class="vx-col md:w-1/4 sm:w-1/2 w-full">
        <label class="text-sm opacity-75">Verified</label>
        <v-select :options="isVerifiedOptions" :clearable="false" :dir="$vs.rtl ? 'rtl' : 'ltr'" v-model="isVerifiedFilter" class="mb-4 sm:mb-0" />
      </div>
      <div class="vx-col md:w-1/4 sm:w-1/2 w-full">
        <label class="text-sm opacity-75">Department</label>
        <v-select :options="departmentOptions" :clearable="false" :dir="$vs.rtl ? 'rtl' : 'ltr'" v-model="departmentFilter" />
      </div>
    </div>
  </vx-card>

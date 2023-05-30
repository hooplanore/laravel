<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head , Link } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';

import { defineComponent } from 'vue'

export default {
  props: {
    groupStudents: {
      type: Array,
      required: true,
    },
  },
}
</script>

<template>
    <div>
      <table>
        <thead>
          <tr>
            <th>Student</th>
            <th>Group</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="groupStudent in groupStudents" :key="groupStudent.id">
            <td>{{ groupStudent.student.name }}</td>
            <td>{{ groupStudent.group.name }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  

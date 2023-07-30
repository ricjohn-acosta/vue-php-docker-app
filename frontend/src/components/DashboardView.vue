<template>
  <DashboardVisualiser :employees="employees" />
  <DashboardTools @update-employees="updateEmployees" />
  <Card class="data-table">
    <template
      v-if="employees && employees.length > 0"
      #title
    >
      Employees
    </template>
    <template #content>
      <DataTable
        v-if="employees && employees.length > 0"
        v-model:editingRows="editingRows"
        edit-mode="row"
        table-class="editable-cells-table"
        table-style="min-width: 50rem"
        :value="employees"
        @row-edit-save="onRowEditSave"
      >
        <Column
          field="company_name"
          header="Company"
        />
        <Column
          field="employee_name"
          header="Name"
        />
        <Column
          field="email"
          header="Email"
        >
          <template #editor="{ data, field }">
            <InputText v-model="data[field]" />
          </template>
        </Column>
        <Column
          field="salary"
          header="Salary"
        />
        <Column
          :row-editor="true"
          style="width: 10%; min-width: 8rem"
          body-style="text-align:center"
        />
      </DataTable>
      <NoDataMessage
        v-else
        title="No employee data to be displayed 🙁"
        subtitle="Please import a CSV file to add employee data."
      />
    </template>
  </Card>
</template>

<script setup>
import {onMounted, ref} from 'vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import InputText from 'primevue/inputtext';
import DashboardTools from "@/components/DashboardTools";
import DashboardVisualiser from "@/components/DashboardVisualiser";
import NoDataMessage from "@/components/NoDataMessage";
import Card from 'primevue/card';
import axios from 'axios';
import { useToast } from "primevue/usetoast";

const toast = useToast();
const employees = ref();
const editingRows = ref([]);

onMounted(async () => {
  try {
    const res = await axios.get('http://localhost:5000/api/v1/employees/getEmployees.php')
    employees.value = res.data
  } catch (e) {
    toast.add({ severity: 'error', summary: 'Network error', life: 3000 });
  }
})

const updateEmployees = (updatedEmployees) => {
  employees.value = updatedEmployees;
}

const onRowEditSave = async (event) => {
  let { newData, index } = event;

  if (employees.value[index]['email'] === newData.email) return;
  employees.value[index] = newData;

  const payload = {employee_id: newData.employee_id, email: newData.email}
  try {
    await axios
      .post('http://localhost:5000/api/v1/employees/updateEmail.php', payload)
      .then((res) => {
        if (res.status === 200) {
          toast.add({ severity: 'success', summary: 'Email changed', life: 3000 });
        }
      })
  } catch (e) {
    toast.add({ severity: 'error', summary: 'Network error', life: 3000 });
  }
};

</script>

<style scoped>
::v-deep(.editable-cells-table td.p-cell-editing) {
  width: 26%
}

.data-table {
  padding: 20px;
  margin-bottom: 50px;
  border-color: #e9ecef;
  border-style: solid;
  border-radius: 22px;
  border-width: 1px;
}

.section-container {
  margin-bottom: 20px;
}

.section-title {
  font-size: 1.4rem;
  font-weight: bolder;
  color: #495057;
}
</style>

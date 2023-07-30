<template>
  <div
    v-if="employees && employees.length > 0"
    class="companies"
  >
    <Card
      v-for="companies in averageSalaries"
      :key="companies.companyName"
      class="company-block"
    >
      <template #title>
        {{ companies.companyName }}
      </template>
      <template #content>
        <div>
          <span class="salary">${{ companies.averageSalary }}</span>
        </div>
        <div class="salary-label">
          <span>Average salary across {{ companies.totalEmployees }} people</span>
        </div>
      </template>
    </Card>
  </div>
  <NoDataMessage
    v-else
    title="No salary data to be displayed 🙁"
    subtitle="Please import a CSV file to add salary data."
  />
</template>

<script setup>
import { defineProps, watch, ref } from 'vue'
import Card from 'primevue/card';
import NoDataMessage from "@/components/NoDataMessage";

const props = defineProps(['employees'])
const averageSalaries = ref()

watch(() => props.employees, (employees) => {
  if (!employees) return
  averageSalaries.value = getAverageSalaries(employees)
});

const getAverageSalaries = (employees) => {
  const salaryByCompany = {}
  employees.forEach((employee) => {
    const { company_name, salary } = employee
    if (!salaryByCompany[company_name]) {
      salaryByCompany[company_name] = { totalSalary: 0, numEmployees: 0 }
    }
    salaryByCompany[company_name].totalSalary += salary
    salaryByCompany[company_name].numEmployees++
  });

  const result = []
  for (const company in salaryByCompany) {
    const averageSalary = {}
    const totalSalary = salaryByCompany[company].totalSalary
    const numEmployees = salaryByCompany[company].numEmployees
    averageSalary['companyName'] = company
    averageSalary['averageSalary'] = Math.trunc(totalSalary / numEmployees)
    averageSalary['totalEmployees'] = salaryByCompany[company].numEmployees
    result.push(averageSalary)
  }

  return result;
}

</script>

<style scoped>
.companies {
  margin-bottom: 40px;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 20px;
}

.company-block {
  border-radius: 22px;
  padding: 20px;
}

.salary {
  font-weight: bolder;
  font-size: 2.4rem;
}

.salary-label {
  margin-top: 20px;
}

@media (max-width: 1236px) {
  .companies {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 800px) {
  .companies {
    grid-template-columns: 1fr;
  }
}

</style>

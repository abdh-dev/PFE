type Task = {
  id: number
  title: string
  description: string
  status: number
  priority: number
  estimated_time: number
  bonus: number
  penalty: number
  start_date: string /* Date */
  due_date: string /* Date */
  completion_date: string /* Date */ | null
  custom_fields: never[]
  created_by: number | null
  updated_by: number | null
  depends_on: number | null
  subtask_of: number | null
  phase_id: number
  created_at: string /* Date */ | null
  updated_at: string /* Date */ | null
  user?: User | null
  phase?: Phase | null
  parent?: Task | null
  children?: Task[] | null
  media?: Media[] | null
}

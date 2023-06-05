type Media = {
  id: number
  model_type: string
  model_id: number
  uuid: string | null
  collection_name: string
  name: string
  file_name: string
  mime_type: string | null
  disk: string
  conversions_disk: string | null
  size: number
  manipulations: never[]
  custom_properties: never[]
  generated_conversions: never[]
  responsive_images: never[]
  order_column: number | null
  created_at: string /* Date */ | null
  updated_at: string /* Date */ | null
  creator?: User | null
}
